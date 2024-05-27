from nameko.rpc import rpc

import dependencies



# nameko run book
# nameko run gateway
# nameko shell
# n.rpc.book_service.get_all_book()
# n.rpc.book_service.get_all_book_type() 
# n.rpc.book_service.get_book_by_num(771)
# n.rpc.book_service.add_book(772, 1, 0)
# n.rpc.book_service.change_book_status(772)
# n.rpc.book_service.delete_book(772)


class insuranceService:

    name = 'insurance_service'

    database = dependencies.Database()


    # KATEGORI ASURANSI

    @rpc
    def get_all_category(self):
        categories = self.database.get_all_category()
        return {
            'code': 200,
            'data': categories
        }

    @rpc
    def get_category_by_id(self, id):
        category = self.database.get_category_by_id(id)
        if category is None:
            return {
                    'code': 404,
                    'data': 'Category ID Invalid.'
                    }
        return {
            'code': 200,
            'data': category
        }

    @rpc
    def add_category(self, nama_kategori):        
        category = self.database.add_category(nama_kategori)
        return {
            'code': 200,
            'data': category
        }

    @rpc
    def edit_category(self, id_kategori, nama_kategori):
        input_category = self.database.get_category_by_id(id_kategori)
        if input_category is None:
            return {
                'code': 404,
                "data": "Category ID Invalid."
            }
    
        category = self.database.edit_category(id_kategori, nama_kategori)
        return {
            'code': 200,
            'data': category
        }


    # TIPE ASURANSI

    @rpc
    def get_all_insurance(self):
        insurances = self.database.get_all_insurance()
        return {
            'code': 200,
            'data': insurances
        }

    @rpc
    def get_insurance_by_category(self, id):
        category = self.database.get_category_by_id(id)
        if category:
            insurances = self.database.get_insurance_by_category(id)
            return {
                'code': 200,
                'data': insurances
            }

        return {
            'code': 400,
            'data': 'Category ID Invalid.'
        }

    @rpc
    def get_insurance_by_id(self, id):
        insurance = self.database.get_insurance_by_id(id)
        if insurance is None:
            return {
                    'code': 404,
                    'data': 'Insurance Type ID Invalid.'
                    }
        return {
            'code': 200,
            'data': insurance
        }

    @rpc
    def add_insurance(self, id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum):        
        insurance = self.database.add_insurance(id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum)
        return {
            'code': 200,
            'data': insurance
        }

    @rpc
    def edit_insurance(self, id_tipe_asuransi, id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum):
        tipe_asuransi = self.database.get_insurance_by_id(id_tipe_asuransi)
        if tipe_asuransi is None:
            return {
                'code': 404,
                "data": "Insurance Type ID Invalid."
            }
         
        insurance = self.database.edit_insurance(id_tipe_asuransi, id_kategori, status_tipe, nama_tipe, premi_asuransi, keterangan, syarat_umum)
        return {
            'code': 200,
            'data': insurance
        }


    # COVERAGE ASURANSI

    @rpc
    def get_coverage_by_insurance_type(self, id):
        tipe_asuransi = self.database.get_insurance_by_id(id)
        if tipe_asuransi:
            category = self.database.get_insurance_category_by_id(id)
            if category == 1:
                status = self.database.get_insurance_status_by_id(id)
                if status:
                    coverages = self.database.get_coverage_by_status_type(status)
                    return {
                        'code': 200,
                        'data': coverages
                    }
                return {
                    'code': 404,
                    'data': 'Coverage Invalid.'
                }
            else if category: 
                coverages = self.database.get_coverage_by_insurance_type(id)
                if coverages is None:
                    return {
                            'code': 404,
                            'data': 'Coverage Invalid.'
                            }
                return {
                    'code': 200,
                    'data': coverages
                }
            return {
                'code': 400,
                'data': 'Category ID Invalid.'
            }
        return {
            'code': 400,
            'data': 'Insurance Type ID Invalid.'
        }

    @rpc
    def get_coverage_by_id(self, id):
        coverage = self.database.get_coverage_by_id(id)
        if coverage is None:
            return {
                    'code': 404,
                    'data': 'Coverage ID Invalid.'
                    }
        return {
            'code': 200,
            'data': coverage
        }

    @rpc
    def add_coverage(self, id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage, id_coverage):        
        coverage = self.database.add_coverage(id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage, id_coverage)
        return {
            'code': 200,
            'data': coverage
        }

    @rpc
    def edit_coverage(self, id_coverage, id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage, id_coverage):
        input_coverage = self.database.get_coverage_by_id(id_coverage)
        if input_coverage is None:
            return {
                'code': 404,
                "data": "Category ID Invalid."
            }
    
        coverage = self.database.edit_coverage(id_coverage, id_tipe_asuransi, status_tipe, coverage, detail_coverage, status_coverage, id_coverage)
        return {
            'code': 200,
            'data': coverage
        }


    # Klaim Asuransi

    @rpc
    def get_all_claim_by_user(self, id_user):
        user_claim = self.database.get_all_claim_by_user(id_user)
        return {'code': 200,'data': user_claim}
    
    @rpc
    def get_claim_by_id(self, id_klaim):
        claim = self.database.get_claim_by_id(id_klaim)
        return {'code': 200,'data': claim}

    @rpc
    def add_claim(self, id_user, id_pembelian, id_pembayaran, link, status):
        claim = self.database.add_claim(id_user, id_pembelian, id_pembayaran, link, status)
        return {'code': 200,'data': claim}
    

    # Pembayaran Asuransi

    @rpc
    def get_all_payment_by_user(self, id_user):
        user_payment = self.database.get_all_payment_by_user(id_user)
        return {'code': 200,'data': user_payment}
    
    @rpc
    def get_payment_by_id(self, id_pembayaran):
        user_payment = self.database.get_payment_by_id(id_pembayaran)
        return {'code': 200,'data': user_payment}
    
    @rpc
    def add_payment(self, id_user, id_pembelian, total_bayar, jenis_pembayaran, nomor_kartu, nomor_rekening, nomor_telepon):
        payment = self.database.add_payment(id_user, id_pembelian, total_bayar, jenis_pembayaran, nomor_kartu, nomor_rekening, nomor_telepon)
        return {'code': 200,'data': payment}
    

    # Pembelian Asuransi

    @rpc
    def get_all_purchase_by_user(self, id_user):
        purchase = self.database.get_all_purchase_by_user(id_user)
        return {'code': 200,'data': purchase}
    
    @rpc
    def get_purchase_by_id(self, id_pembelian):
        purchase = self.database.get_purchase_by_id(id_pembelian)
        return {'code': 200,'data': purchase}
    
    @rpc
    def add_purchase(self, id_user, id_booking, id_tipe_asuransi, jumlah, status_pembayaran):
        purchase = self.database.add_purchase(id_user, id_booking, id_tipe_asuransi, jumlah, status_pembayaran)
        return {'code': 200,'data': purchase}