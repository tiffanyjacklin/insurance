import json

from nameko.rpc import RpcProxy
from nameko.web.handlers import http


class GatewayService:
    name = 'gateway'

    insurance_rpc = RpcProxy('insurance_service')

    # KATEGORI ASURANSI

    @http('GET', '/insurance_category')
    def get_all_category(self, request):
        categories = self.insurance_rpc.get_all_category()
        return categories['code'],json.dumps(categories['data'])

    @http('GET', '/insurance_category/<int:id_kategori>')
    def get_category_by_id(self, request, id):
        category = self.insurance_rpc.get_category_by_id(id_kategori)
        return category['code'],json.dumps(category['data'])

    @http('POST', '/insurance_category')
    def add_category(self, request):
        data = json.loads(request.get_data(as_text=True))
        nama_kategori = data.get('nama_kategori')
        category = self.insurance_rpc.add_category(nama_kategori)   
        return category['code'],json.dumps(category['data'])

    @http('PUT', '/insurance_category/<int:id_kategori>')
    def edit_category(self, request, id_kategori):
        data = json.loads(request.get_data(as_text=True))
        nama_kategori = data.get('nama_kategori')
        category = self.insurance_rpc.edit_category(id_kategori, nama_kategori)
        return category['code'],json.dumps(category['data'])


    # TIPE ASURANSI

    @http('GET', '/insurance')
    def get_all_insurance(self, request):
        insurances = self.insurance_rpc.get_all_insurance()
        return insurances['code'],json.dumps(insurances['data'])

    @http('GET', '/insurance/insurance_category/<int:id_kategori>')
    def get_insurance_by_category(self, request, id_kategori):
        insurances = self.insurance_rpc.get_insurance_by_category(id_kategori)
        return insurances['code'],json.dumps(insurances['data'])

    @http('GET', '/insurance/<int:id_tipe_asuransi>')
    def get_insurance_by_id(self, request, id_tipe_asuransi):
        insurance = self.insurance_rpc.get_insurance_by_id(id_tipe_asuransi)
        return insurance['code'],json.dumps(insurance['data'])

    @http('POST', '/insurance')
    def add_insurance(self, request):
        data = json.loads(request.get_data(as_text=True))
        id_kategori     = data.get('id_kategori')
        status_tipe     = data.get('status_tipe')
        nama_tipe       = data.get('nama_tipe')
        premi_asuransi  = data.get('premi_asuransi')
        keterangan      = data.get('keterangan')
        syarat_umum     = data.get('syarat_umum')
        insurance       = self.insurance_rpc.add_insurance(id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum)   
        return insurance['code'],json.dumps(insurance['data'])

    @http('PUT', '/insurance/<int:id_tipe_asuransi>')
    def edit_insurance(self, request, id_tipe_asuransi):
        data = json.loads(request.get_data(as_text=True))
        id_kategori     = data.get('id_kategori')
        status_tipe     = data.get('status_tipe')
        nama_tipe       = data.get('nama_tipe')
        premi_asuransi  = data.get('premi_asuransi')
        keterangan      = data.get('keterangan')
        syarat_umum     = data.get('syarat_umum')
        insurance = self.insurance_rpc.edit_insurance(id_tipe_asuransi, id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum)
        return insurance['code'],json.dumps(insurance['data'])


    # COVERAGE ASURANSI

    @http('GET', '/coverage/insurance/<int:id_tipe_asuransi>')
    def get_coverage_by_insurance_type(self, request, id_tipe_asuransi):
        coverages = self.insurance_rpc.get_coverage_by_insurance_type(id_tipe_asuransi)
        return coverages['code'],json.dumps(coverages['data'])

    http('GET', '/coverage/<int:id_coverage>')
    def get_coverage_by_id(self, request, id_coverage):
        coverages = self.insurance_rpc.get_coverage_by_id(id_coverage)
        return coverage['code'],json.dumps(coverage['data'])

    @http('POST', '/coverage')
    def add_coverage(self, request):
        data = json.loads(request.get_data(as_text=True))
        id_tipe_asuransi = data.get('id_tipe_asuransi')
        status_tipe      = data.get('status_tipe')
        coverage         = data.get('coverage')
        detail_coverage  = data.get('detail_coverage')
        status_coverage  = data.get('status_coverage')
        coverage = self.insurance_rpc.add_coverage(id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage)   
        return coverage['code'],json.dumps(coverage['data'])

    @http('PUT', '/coverage/<int:id_coverage>')
    def edit_coverage(self, request, id_coverage):
        data = json.loads(request.get_data(as_text=True))
        id_tipe_asuransi = data.get('id_tipe_asuransi')
        status_tipe      = data.get('status_tipe')
        coverage         = data.get('coverage')
        detail_coverage  = data.get('detail_coverage')
        status_coverage  = data.get('status_coverage')
        coverage = self.insurance_rpc.edit_coverage(id_coverage, id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage)
        return coverage['code'],json.dumps(coverage['data'])


    # Klaim Asuransi

    @http('GET', '/insurance_claim/all/<int:id_user>')
    def get_all_claim_by_user(self, request, id_user):
        claim = self.insurance_rpc.get_all_claim_by_user(id_user)
        return claim['code'],json.dumps(claim['data'])
    
    @http('GET', '/insurance_claim/<int:id_klaim>')
    def get_all_claim_by_user(self, request, id_klaim):
        claim = self.insurance_rpc.get_claim_by_id(id_klaim)
        return claim['code'],json.dumps(claim['data'])

    @http('POST', '/claim_insurance/add')
    def add_claim(self, request):
        data = json.loads(request.get_data(as_text=True))
        data['status'] = data.get('status', 0)
        claim = self.insurance_rpc.add_claim(data['id_user'], data['id_pembelian'], data['id_pembayaran'], data['link'], data['status'])
        return claim['code'],json.dumps(claim['data'])
    

    # Pembayaran Asuransi

    @http('GET', '/insurance_payment/all/<int:id_user>')
    def get_all_payment_by_user(self, request, id_user):
        payment = self.insurance_rpc.get_all_payment_by_user(id_user)
        return payment['code'],json.dumps(payment['data'])
    
    @http('GET', '/insurance_payment/<int:id_pembayaran>')
    def get_payment_by_id(self, request, id_pembayaran):
        payment = self.insurance_rpc.get_payment_by_id(id_pembayaran)
        return payment['code'],json.dumps(payment['data'])
    
    @http('POST', '/insurance_payment/add')
    def add_payment(self, request):
        data = json.loads(request.get_data(as_text=True))
        payment = self.insurance_rpc.add_payment(data['id_user'], data['id_pembelian'], data['total_bayar'], data['jenis_pembayaran'], data['nomor_kartu'], data['nomor_rekening'], data['nomor_telepon'])
        return payment['code'],json.dumps(payment['data'])
    

    # Pembelian Asuransi
    
    @http('GET', '/insurance_purchase/all/<int:id_user>')
    def get_all_purchase_by_user(self, request, id_user):
        purchase = self.insurance_rpc.get_all_purchase_by_user(id_user)
        return purchase['code'],json.dumps(purchase['data'])

    @http('GET', '/insurance_purchase/<int:id_pembelian>')
    def get_purchase_by_id(self, request, id_pembelian):
        purchase = self.insurance_rpc.get_purchase_by_id(id_pembelian)
        return purchase['code'],json.dumps(purchase['data'])
    
    @http('POST', '/insurance_purchase/add')
    def add_purchase(self, request):
        data = json.loads(request.get_data(as_text=True))
        purchase = self.insurance_rpc.add_purchase(data['id_user'], data['id_booking'], data['id_tipe_asuransi'], data['jumlah'], data['status_pembayaran'])
        return purchase['code'],json.dumps(purchase['data'])