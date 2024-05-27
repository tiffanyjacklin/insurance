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


class bookService:

    name = 'book_service'

    database = dependencies.Database()

    @rpc
    def get_all_book_type(self):
        book_types = self.database.get_all_book_type()
        return book_types

    @rpc
    def get_all_book(self):
        books = self.database.get_all_book()
        return {
            'code' : 200,
            'data' : books
        }
    @rpc
    def get_book_by_num(self, num):
        book = self.database.get_book_by_num(num)
        if book is None:
            return {
                    'code' : 404,
                    'data': 'book number invalid'
                    }
        return {
            'code':200,
            'data':book
        }

    @rpc
    def add_book(self, book_num, status=None):
        # status = 0 if status is None else status
        # book = self.database.add_book(book_num, book_type, status)
        # return book
        
        input_book = self.database.get_book_by_num(book_num)
        if input_book:
             return {
                'code': 400,
                'data': 'book unavailable'
                }
        else :
            available_book_type = self.database.check_book_status(book_type)
            if(available_book_type):
                book = self.database.add_book(book_num, book_type, status)
                return {'code': 200,'data': book}
            else:
                 return {
                'code' : 404,
                "data": "book type not available"
                }

    @rpc
    def change_book_status(self, book_num):
        input_book = self.database.get_book_by_num(book_num)
        if input_book is None:
            return {
                'code': 404,
                "data": "book number invalid"
            }
    
        book = self.database.change_book_status(book_num)
        return {
            'code': 200,
            'data': book
        }
    
    @rpc
    def delete_book(self, book_num):
        input_book = self.database.get_book_by_num(book_num)
        if input_book is None:
            return {
                'code': 404,
                "data": "book number invalid"
            }
        
        book = self.database.delete_book(book_num)
        return {
            'code': 200,
            'data': book
        }

# Method to add a book
# add_book(self, book_num, book_type)

# Method to change a book's status (0 to 1, or vice versa)
# change_book_status(self, book_num)

# Method to delete a book
# delete_book(self, book_num)

# Notes: you may replace book_num with id
