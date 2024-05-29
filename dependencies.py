from nameko.extensions import DependencyProvider

import mysql.connector
from mysql.connector import Error
from mysql.connector import pooling
from datetime import datetime

class DatabaseWrapper:

    connection = None

    def __init__(self, connection):
        self.connection = connection


    # KATEGORI ASURANSI

    def get_all_category(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `kategori_asuransi`"
        cursor.execute(sql)
        for row in cursor.fetchall():
            result.append({
                'id_kategori': row['id_kategori'],
                'nama_kategori': row['nama_kategori']
            })
        cursor.close()
        return result

    def get_category_by_id(self, id_kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `kategori_asuransi` WHERE `id_kategori` = {}".format((id_kategori))
        cursor.execute(sql)
        result = cursor.fetchone()
        cursor.close()
        return result

    def add_category(self, nama_kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql_insert_category = "INSERT INTO `kategori_asuransi` (`nama_kategori`) VALUES (%s);"
        cursor.execute(sql_insert_category, (nama_kategori,))
        self.connection.commit() 
        cursor.close()
        return True

    def edit_category(self, id_kategori, nama_kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql_update_category = "UPDATE `kategori_asuransi` SET `nama_kategori` = %s WHERE `id_kategori` = %s;"
        cursor.execute(sql_update_category, (nama_kategori, id_kategori))
        self.connection.commit()
        cursor.close()
        return self.get_category_by_id(id_kategori)


    # TIPE ASURANSI

    def get_all_insurance(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `tipe_asuransi`"
        cursor.execute(sql)
        for row in cursor.fetchall():
            result.append({
                'id_tipe_asuransi'  : row['id_tipe_asuransi'],
                'id_kategori'       : row['id_kategori'],
                'status_tipe'       : row['status_tipe'],
                'nama_tipe'         : row['nama_tipe'],
                'premi_asuransi'    : row['premi_asuransi'],
                'keterangan'        : row['keterangan'],
                'syarat_umum'       : row['syarat_umum']
            })
        cursor.close()
        return result

    def get_insurance_by_category(self, id_kategori):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `tipe_asuransi` WHERE id_kategori = %s"
        cursor.execute(sql, (id_kategori,))
        for row in cursor.fetchall():
            result.append({
                'id_tipe_asuransi'  : row['id_tipe_asuransi'],
                'id_kategori'       : row['id_kategori'],
                'status_tipe'       : row['status_tipe'],
                'nama_tipe'         : row['nama_tipe'],
                'premi_asuransi'    : row['premi_asuransi'],
                'keterangan'        : row['keterangan'],
                'syarat_umum'       : row['syarat_umum']
            })
        cursor.close()
        return result

    def get_insurance_by_id(self, id_tipe_asuransi):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `tipe_asuransi` WHERE `id_tipe_asuransi` = %s"
        cursor.execute(sql, (id_tipe_asuransi,))
        result = cursor.fetchone()
        cursor.close()
        return result

    def get_insurance_category_by_id(self, id_tipe_asuransi):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT `id_kategori` FROM `tipe_asuransi` WHERE `id_tipe_asuransi` = %s"
        cursor.execute(sql, (id_tipe_asuransi,))
        result = cursor.fetchone()
        cursor.close()
        return result['id_kategori'] if result else None
    
    def get_insurance_status_by_id(self, id_tipe_asuransi):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT `status_tipe` FROM `tipe_asuransi` WHERE `id_tipe_asuransi` = %s"
        cursor.execute(sql, (id_tipe_asuransi,))
        result = cursor.fetchone()
        cursor.close()
        return result['status_tipe'] if result else None

    def add_insurance(self, id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum):
        cursor = self.connection.cursor(dictionary=True)
        sql_insert_insurance = "INSERT INTO `tipe_asuransi` (`id_kategori`, `status_tipe`, `nama_tipe`, `premi_asuransi`, `keterangan`, `syarat_umum`) VALUES (%s, %s, %s, %s, %s, %s);"
        cursor.execute(sql_insert_insurance, (id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum))
        self.connection.commit()
        cursor.close()
        return True

    def edit_insurance(self, id_tipe_asuransi, id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum):
        cursor = self.connection.cursor(dictionary=True)
        sql_update_insurance = "UPDATE `tipe_asuransi` SET `id_kategori` = %s, `status_tipe` = %s, `nama_tipe` = %s, `premi_asuransi` = %s, `keterangan` = %s, `syarat_umum` = %s WHERE `id_tipe_asuransi` = %s;"
        cursor.execute(sql_update_insurance, (id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum, id_tipe_asuransi))
        self.connection.commit()
        cursor.close()
        return self.get_insurance_by_id(id_tipe_asuransi)


    # COVERAGE ASURANSI

    def get_coverage_by_insurance_type(self, id_tipe_asuransi):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `coverage_asuransi` WHERE `id_tipe_asuransi` = %s"
        cursor.execute(sql, (id_tipe_asuransi,))
        for row in cursor.fetchall():
            result.append({
                'id_coverage'       : row['id_coverage'],
                'id_tipe_asuransi'  : row['id_tipe_asuransi'],
                'status_tipe'       : row['status_tipe'],
                'coverage'          : row['coverage'],
                'detail_coverage'   : row['detail_coverage'],
                'status_coverage'   : row['status_coverage']
            })
        cursor.close()
        return result if result else None

    def get_coverage_by_status_type(self, status_tipe):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `coverage_asuransi` WHERE `status_tipe` = %s"
        cursor.execute(sql, (status_tipe,))
        for row in cursor.fetchall():
            result.append({
                'id_coverage'       : row['id_coverage'],
                'id_tipe_asuransi'  : row['id_tipe_asuransi'],
                'status_tipe'       : row['status_tipe'],
                'coverage'          : row['coverage'],
                'detail_coverage'   : row['detail_coverage'],
                'status_coverage'   : row['status_coverage']
            })
        cursor.close()
        return result if result else None

    def get_coverage_by_id(self, id_coverage):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `coverage_asuransi` WHERE `id_coverage` = %s"
        cursor.execute(sql, (id_coverage,))
        result = cursor.fetchone()
        cursor.close()
        return result

    def add_coverage(self, id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage):
        cursor = self.connection.cursor(dictionary=True)
        sql_insert_coverage = "INSERT INTO `coverage_asuransi` (`id_tipe_asuransi`, `status_tipe`, `coverage`, `detail_coverage`, `status_coverage`) VALUES (%s, %s, %s, %s, %s)"
        cursor.execute(sql_insert_coverage, (id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage))
        self.connection.commit() 
        cursor.close()
        return True

    def edit_coverage(self, id_coverage, id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage):
        cursor = self.connection.cursor(dictionary=True)
        sql_update_coverage = "UPDATE `coverage_asuransi` SET `id_tipe_asuransi` = %s, `status_tipe` = %s, `coverage` = %s, `detail_coverage` = %s, `status_coverage` = %s WHERE `id_coverage` = %s"
        cursor.execute(sql_update_coverage, (id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage, id_coverage))
        self.connection.commit()
        cursor.close()
        
        return self.get_coverage_by_id(id_coverage)


    # Pembelian Asuransi

    def get_all_purchase_by_user(self, id_user):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `pembelian_asuransi` WHERE `id_user` = %s"
        cursor.execute(sql,(id_user,))
        for row in cursor.fetchall():
            if isinstance(row['date_time'], datetime):
                row['date_time'] = row['date_time'].isoformat()

            result.append({
                'id_pembelian': row['id_pembelian'],
                'id_user': row['id_user'],
                'id_booking': row['id_booking'],
                'id_tipe_asuransi': row['id_tipe_asuransi'],
                'jumlah': row['jumlah'],
                'date_time': row['date_time'],
                'status_pembayaran': row['status_pembayaran']
            })
        cursor.close()

        return result
    
    def get_purchase_by_id(self, id_pembelian):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `pembelian_asuransi` WHERE `id_pembelian` = %s"
        cursor.execute(sql,(id_pembelian,))
        result = cursor.fetchone()
        cursor.close()
        if result:
            for key, value in result.items():
                if isinstance(value, datetime):
                    result[key] = value.isoformat()

        return result

    def get_purchase_total_by_id(self, id_pembelian):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT `tipe_asuransi`.`premi_asuransi`*`pembelian_asuransi`.`jumlah` AS `total` FROM `pembelian_asuransi` JOIN `tipe_asuransi` ON `tipe_asuransi`.`id_tipe_asuransi` = `pembelian_asuransi`.`id_tipe_asuransi` WHERE `id_pembelian` = %s;"
        cursor.execute(sql,(id_pembelian,))
        result = cursor.fetchone()
        cursor.close()
        return result['total'] if result else None
    
    def add_purchase(self, id_user, id_booking, id_tipe_asuransi, jumlah, status_pembayaran):
        current_timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        cursor = self.connection.cursor(dictionary=True)
        sql = "INSERT INTO `pembelian_asuransi` (`id_user`, `id_booking`, `id_tipe_asuransi`, `jumlah`, `date_time`, `status_pembayaran`) VALUES (%s, %s, %s, %s, %s, %s)"
        cursor.execute(sql, (id_user, id_booking, id_tipe_asuransi, jumlah, current_timestamp, status_pembayaran))
        self.connection.commit()
        cursor.close()
        return True

    def edit_purchase_status(self, id_pembelian, status_pembayaran):
        cursor = self.connection.cursor(dictionary=True)
        sql_update_purchase = "UPDATE `pembelian_asuransi` SET `status_pembayaran` = %s WHERE `id_pembelian` = %s;"
        cursor.execute(sql_update_purchase, (status_pembayaran, id_pembelian))
        self.connection.commit()
        cursor.close()
        
        return True


    # Pembayaran Asuransi

    def get_all_payment_by_user(self, id_user):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `pembayaran_asuransi` WHERE `id_user` = %s"
        cursor.execute(sql,(id_user,))
        for row in cursor.fetchall():
            if isinstance(row['timestamp'], datetime):
                row['timestamp'] = row['timestamp'].isoformat()

            result.append({
                'id_pembayaran': row['id_pembayaran'],
                'id_user': row['id_user'],
                'id_pembelian': row['id_pembelian'],
                'timestamp': row['timestamp'],
                'total_bayar': row['total_bayar'],
                'pajak': row['pajak'],
                'jenis_pembayaran': row['jenis_pembayaran'],
                'nomor_kartu': row['nomor_kartu'],
                'nomor_rekening': row['nomor_rekening'],
                'nomor_telepon': row['nomor_telepon']
            })
        # for row in cursor.fetchall():
        #     data = {
        #         'id_pembayaran': row['id_pembayaran'],
        #         'id_user': row['id_user'],
        #         'id_pembelian': row['id_pembelian'],
        #         'timestamp': row['timestamp'],
        #         'total_bayar': row['total_bayar'],
        #         'pajak': row['pajak'],
        #         'jenis_pembayaran': row['jenis_pembayaran'],
        #     }

        #     if row['nomor_kartu'] is not None:
        #         data['nomor_kartu'] = row['nomor_kartu']
        #     if row['nomor_rekening'] is not None:
        #         data['nomor_rekening'] = row['nomor_rekening']
        #     if row['nomor_telepon'] is not None:
        #         data['nomor_telepon'] = row['nomor_telepon']
        
        #     result.append(data)

        cursor.close()

        return result
    
    def get_payment_by_id(self, id_pembayaran):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `pembayaran_asuransi` WHERE `id_pembayaran` = %s"
        cursor.execute(sql,(id_pembayaran,))
        result = cursor.fetchone()
        cursor.close()
        
        if result:
            for key, value in result.items():
                if isinstance(value, datetime):
                    result[key] = value.isoformat()

        return result
    
    def add_payment(self, id_user, id_pembelian, jenis_pembayaran, nomor):
        current_timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        total_bayar = self.get_purchase_total_by_id(id_pembelian)
        if total_bayar is None:
            raise ValueError("Invalid purchase ID")  # Handle invalid purchase ID case

        cursor = self.connection.cursor(dictionary=True)
        sql = ""
        if (jenis_pembayaran == 1):
            sql = "INSERT INTO `pembayaran_asuransi` (`id_user`, `id_pembelian`, `timestamp`, `total_bayar`, `pajak`, `jenis_pembayaran`, `nomor_kartu`, `nomor_rekening`, `nomor_telepon`) VALUES (%s, %s, %s, %s, %s, %s, %s, NULL, NULL)"
        elif (jenis_pembayaran == 2):
            sql = "INSERT INTO `pembayaran_asuransi` (`id_user`, `id_pembelian`, `timestamp`, `total_bayar`, `pajak`, `jenis_pembayaran`, `nomor_kartu`, `nomor_rekening`, `nomor_telepon`) VALUES (%s, %s, %s, %s, %s, %s, NULL, %s, NULL)"
        elif (jenis_pembayaran == 3):
            sql = "INSERT INTO `pembayaran_asuransi` (`id_user`, `id_pembelian`, `timestamp`, `total_bayar`, `pajak`, `jenis_pembayaran`, `nomor_kartu`, `nomor_rekening`, `nomor_telepon`) VALUES (%s, %s, %s, %s, %s, %s, NULL, NULL, %s)"
        pajak = total_bayar * 0.11
        cursor.execute(sql, (id_user, id_pembelian, current_timestamp, total_bayar, pajak, jenis_pembayaran, nomor))
        self.connection.commit()
        cursor.close()
        return True
    

    # Klaim Asuransi

    def get_all_claim_by_user(self, id_user):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `klaim_asuransi` WHERE `id_user` = %s"
        cursor.execute(sql,(id_user,))
        for row in cursor.fetchall():
            if isinstance(row['timestamp'], datetime):
                row['timestamp'] = row['timestamp'].isoformat()
                
            result.append({
                'id_klaim': row['id_klaim'],
                'id_user': row['id_user'],
                'id_pembelian': row['id_pembelian'],
                'id_pembayaran': row['id_pembayaran'],
                'link_bukti': row['link_bukti'],
                'timestamp': row['timestamp'],
                'status_klaim': row['status_klaim']
            })
        cursor.close()
        return result
    
    def get_claim_by_id(self, id_klaim):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `klaim_asuransi` WHERE `id_klaim` = %s"
        cursor.execute(sql,(id_klaim,))
        result = cursor.fetchone()
        cursor.close()
        
        if result:
            for key, value in result.items():
                if isinstance(value, datetime):
                    result[key] = value.isoformat()
        return result
    
    def add_claim(self, id_user, id_pembelian, id_pembayaran, link, status):
        current_timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        cursor = self.connection.cursor(dictionary=True)
        sql = "INSERT INTO `klaim_asuransi` (`id_user`, `id_pembelian`, `id_pembayaran`, `link_bukti`, `timestamp`, `status_klaim`) VALUES (%s, %s, %s, %s, %s, %s)"
        cursor.execute(sql, ( id_user, id_pembelian, id_pembayaran, link, current_timestamp, status))
        self.connection.commit()
        cursor.close()
        return True
    
    def edit_status_claim(self, id_klaim, status_klaim):
        cursor = self.connection.cursor(dictionary=True)
        sql = "UPDATE `klaim_asuransi` SET `status_klaim` = %s WHERE `id_klaim` = %s"
        cursor.execute(sql, (status_klaim, id_klaim))
        self.connection.commit()
        cursor.close()
        return True
    
    def __del__(self):
       self.connection.close()


class Database(DependencyProvider):

    connection_pool = None

    def __init__(self):
        try:
            self.connection_pool = mysql.connector.pooling.MySQLConnectionPool(
                pool_name="database_pool",
                pool_size=32,
                pool_reset_session=True,
                host='localhost',
                database='insurance',
                user='root',
                password=''
            )

        except Error as e :
            print ("Error while connecting to MySQL using Connection pool ", e)

    def get_dependency(self, worker_ctx):
        return DatabaseWrapper(self.connection_pool.get_connection())
