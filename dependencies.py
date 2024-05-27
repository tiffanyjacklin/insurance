from nameko.extensions import DependencyProvider

import mysql.connector
from mysql.connector import Error
from mysql.connector import pooling

class DatabaseWrapper:

    connection = None

    def __init__(self, connection):
        self.connection = connection

    def get_all_room_type(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM room_type"
        cursor.execute(sql)
        for row in cursor.fetchall():
            result.append({
                'id': row['id'],
                'name': row['name'],
                'price': row['price'],
                'capacity': row['capacity'],
                'status': row['status']
            })
        cursor.close()
        return result

    def get_all_room(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM room"
        cursor.execute(sql)
        for row in cursor.fetchall():
            result.append({
                'num': row['num'],
                'id_type': row['id_type'],
                'status': row['status']
            })
        cursor.close()
        return result

    def get_room_by_type(self, type):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM room_type WHERE id = {}".format((type))
        cursor.execute(sql)
        result = cursor.fetchone()
        cursor.close()
        return result

    def check_room_status(self, id):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT status FROM room_type WHERE id = %s"
        cursor.execute(sql, (id,))
        room = cursor.fetchone() 
        
        if room and room['status'] == 1:
            cursor.close()
            return True
        else:
            cursor.close()
            return False

    def get_room_by_num(self, num):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `room` WHERE `num` = %s;"
        cursor.execute(sql, (num,))
        result = cursor.fetchone()
        cursor.close()
        return result

    def add_room(self, room_num, room_type, status):
        cursor = self.connection.cursor(dictionary=True)
    # result = []
        
    # sql_check_room_type = "SELECT * FROM `room_type` WHERE `id` = %s;"
    # cursor.execute(sql_check_room_type, (room_type,))
    # room_type_info = cursor.fetchone()

    # if room_type_info:
        sql_insert_room = "INSERT INTO `room` (`num`, `id_type`, `status`) VALUES (%s, %s, %s);"
        cursor.execute(sql_insert_room, (room_num, room_type, status))
        self.connection.commit() 

    #     result.append("Room added successfully")
    # else:
    #     result.append("Room type does not exist")

        cursor.close()
        return True


    def change_room_status(self, room_num):
        cursor = self.connection.cursor(dictionary=True)
        # result = []

        sql = "SELECT * FROM `room` WHERE `num` = %s;"
        cursor.execute(sql, (room_num,))
        row = cursor.fetchone()

        new_status = 0 if row['status'] == 1 else 1 

        sql_update_room = "UPDATE `room` SET `status` = %s WHERE `num` = %s;"
        cursor.execute(sql_update_room, (new_status, room_num))
        self.connection.commit()

        # if cursor.rowcount > 0:
        #     result.append("Room status changed successfully")
        # else:
        #     result.append("Room not found")

        cursor.close()
        # return True
        return new_status

    
    def delete_room(self, room_num):
        cursor = self.connection.cursor(dictionary=True)
        # result = []

        sql_delete_room = "DELETE FROM `room` WHERE `num` = %s;"
        cursor.execute(sql_delete_room, (room_num,))
        self.connection.commit()

        # if cursor.rowcount > 0:
        #     result.append("Room deleted successfully")
        # else:
        #     result.append("Room not found")

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
                pool_size=10,
                pool_reset_session=True,
                host='localhost',
                database='hotel',
                user='root',
                password=''
            )

        except Error as e :
            print ("Error while connecting to MySQL using Connection pool ", e)

    def get_dependency(self, worker_ctx):
        return DatabaseWrapper(self.connection_pool.get_connection())
