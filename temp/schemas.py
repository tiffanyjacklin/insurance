from marshmallow import Schema, fields


class CarInsuranceSchema(Schema):
    id_car = fields.Int(required=True)
    provinsi = fields.Str(required=True, validate=lambda s: len(s) <= 50)
    field_1_4 = fields.Int(required=True, data_key='1-4')
    field_5_6 = fields.Int(required=True, data_key='5-6')
    field_7_8 = fields.Int(required=True, data_key='7-8')
    field_9_10 = fields.Int(required=True, data_key='9-10')
    field_11_15 = fields.Int(required=True, data_key='11-15')
    field_16_20 = fields.Int(required=True, data_key='16-20')
    field_21_25 = fields.Int(required=True, data_key='21-25')
    field_26_30 = fields.Int(required=True, data_key='26-30')
    field_366 = fields.Int(required=True, data_key='366')

class CitiesSchema(Schema):
    id = fields.Int(required=True)
    nama_kota_kabupaten = fields.Str(required=True, validate=lambda s: len(s) <= 50)
    provinsi = fields.Str(required=True, validate=lambda s: len(s) <= 50)
    id_car_insurance = fields.Int(required=True)

class KategoriAsuransiSchema(Schema):
    id_kategori = fields.Int(required=True)
    nama_kategori = fields.Str(required=True, validate=lambda s: len(s) <= 50)

class PembayaranAsuransiSchema(Schema):
    id_pembayaran = fields.Int(required=True)
    id_user = fields.Int(required=True)
    id_pembelian = fields.Int(required=True)
    timestamp = fields.DateTime(required=True)
    total_bayar = fields.Float(required=True)
    pajak = fields.Float(required=True)
    jenis_pembayaran = fields.Int(required=True)
    nomor_kartu = fields.Str(required=False, validate=lambda s: len(s) <= 16)
    nomor_rekening = fields.Str(required=False, validate=lambda s: len(s) <= 20)
    nomor_telepon = fields.Str(required=False, validate=lambda s: len(s) <= 13)

class PembelianAsuransiSchema(Schema):
    id_pembelian = fields.Int(required=True)
    id_user = fields.Int(required=True)
    id_booking = fields.Int(required=False)
    id_kategori = fields.Int(required=True)
    id_tipe_asuransi = fields.Int(required=True)
    jumlah_orang = fields.Int(required=True)
    jumlah_hari = fields.Int(required=True)
    start_date = fields.Date()
    end_date = fields.Date()
    total_bayar = fields.Int(required=True)
    timestamp = fields.DateTime(required=True)
    status_pembayaran = fields.Int(required=True)

class TravelInsuranceSchema(Schema):
    id_travel = fields.Int(required=True)
    wilayah = fields.Int(required=True)
    negara = fields.Str(required=True, validate=lambda s: len(s) <= 50)
    field_1_4 = fields.Int(required=True, data_key='1-4')
    field_5_6 = fields.Int(required=True, data_key='5-6')
    field_7_8 = fields.Int(required=True, data_key='7-8')
    field_9_10 = fields.Int(required=True, data_key='9-10')
    field_11_15 = fields.Int(required=True, data_key='11-15')
    field_16_20 = fields.Int(required=True, data_key='16-20')
    field_21_25 = fields.Int(required=True, data_key='21-25')
    field_26_30 = fields.Int(required=True, data_key='26-30')
    field_366 = fields.Int(required=True, data_key='366')