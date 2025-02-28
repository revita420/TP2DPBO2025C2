from PetShop import PetShop

class Aksesoris(PetShop):
    def __init__(self, id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna):
        super().__init__(id, nama_produk, harga_produk, stok_produk)
        self.jenis = jenis
        self.bahan = bahan
        self.warna = warna
    
    def get_jenis(self):
        return self.jenis
    
    def get_bahan(self):
        return self.bahan
    
    def get_warna(self):
        return self.warna
    
    def set_jenis(self, jenis):
        self.jenis = jenis
    
    def set_bahan(self, bahan):
        self.bahan = bahan
    
    def set_warna(self, warna):
        self.warna = warna