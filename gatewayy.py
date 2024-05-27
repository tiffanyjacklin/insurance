import json

from nameko.rpc import RpcProxy
from nameko.web.handlers import http


class GatewayService:
    name = 'gateway'

    hotel_rpc = RpcProxy('room_service')

    # buka yet another rest client di extension
    # http://localhost:8000/room
    # GET /room
    @http('GET', '/room')
    def get_rooms(self, request):
        rooms = self.hotel_rpc.get_all_room()
        return rooms['code'],json.dumps(rooms['data'])

    # get info details of a particular room (identified by room_num)
    # get room by number

    # http://localhost:8000/room/771
    # GET /room/102
    @http('GET', '/room/<int:num>')
    def get_room_by_num(self, request, num):
        room = self.hotel_rpc.get_room_by_num(num)
        return room['code'],json.dumps(room['data'])

    # create a new room
    # post kan nambah / create resource baru, 
    # kalo diset 0 g bs dipake, ngmg kalo ditolak, id type e ini g bs digunakan, kalo 1 bole digunakan 
    # POST /room
    # http://localhost:8000/room
    # {
    #     "num": 402,
    #     "id_type": 4,
    #     "status": 1 
    # }
     #kalo g dikasi ntik jd 0, krn udh pny default e
    @http('POST', '/room')
    def add_room(self, request, status=None):
        data = json.loads(request.get_data(as_text=True))

        if len(data) == 2:
            data['status'] = 0

        num = data.get('num')
        id_type = data.get('id_type')
        status = data.get('status', 0)
        room = self.hotel_rpc.add_room(num, id_type, status)   
        
        return room['code'],json.dumps(room['data'])
        
    # toggle the status (0 to 1, or vice versa) of a particular room (identified by room_num)
    # mau ngerubah isi resource e, misal yg baru kita tmbhkan
    # cuma ganti status dari 0 jd 1, 1 jd 0, butuh ambil status
    # PUT /room/402
    @http('PUT', '/room/<int:room_num>')
    def change_room_status(self, request, room_num):
        room = self.hotel_rpc.change_room_status(room_num)
        return room['code'],json.dumps(room['data'])

    # delete a particular room (identified by room_num)
    # hapus resource, dari db, 
    @http('DELETE', '/room/<int:room_num>')
    def delete_room(self, request, room_num):
        room = self.hotel_rpc.delete_room(room_num)
        return room['code'],json.dumps(room['data'])
