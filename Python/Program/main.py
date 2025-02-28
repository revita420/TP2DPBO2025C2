from Baju import Baju

def display_table_header():
    print("+" + "-" * 6 + "+" + "-" * 20 + "+" + "-" * 15 + "+" + "-" * 12 + "+" + 
          "-" * 15 + "+" + "-" * 15 + "+" + "-" * 15 + "+" + "-" * 15 + "+" + 
          "-" * 10 + "+" + "-" * 15 + "+")
    
    print("| {:<4} | {:<18} | {:<13} | {:<10} | {:<13} | {:<13} | {:<13} | {:<13} | {:<8} | {:<13} |".format(
        "ID", "Nama Produk", "Harga", "Stok", "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk"))
    
    print("+" + "-" * 6 + "+" + "-" * 20 + "+" + "-" * 15 + "+" + "-" * 12 + "+" + 
          "-" * 15 + "+" + "-" * 15 + "+" + "-" * 15 + "+" + "-" * 15 + "+" + 
          "-" * 10 + "+" + "-" * 15 + "+")


def display_table_footer():
    print("+" + "-" * 6 + "+" + "-" * 20 + "+" + "-" * 15 + "+" + "-" * 12 + "+" + 
          "-" * 15 + "+" + "-" * 15 + "+" + "-" * 15 + "+" + "-" * 15 + "+" + 
          "-" * 10 + "+" + "-" * 15 + "+")


def display_products(products):
    display_table_header()
    
    for product in products:
        print("| {:<4} | {:<18} | Rp {:<10.2f} | {:<10} | {:<13} | {:<13} | {:<13} | {:<13} | {:<8} | {:<13} |".format(
            product.get_id(), product.get_nama_produk(), product.get_harga_produk(), product.get_stok_produk(),
            product.get_jenis(), product.get_bahan(), product.get_warna(), product.get_untuk(),
            product.get_size(), product.get_merk()))
    
    display_table_footer()


def add_new_product():
    print("\n=== Tambah Produk Baru ===")
    
    id = input("ID: ")
    nama_produk = input("Nama Produk: ")
    harga_produk = float(input("Harga Produk: "))
    stok_produk = int(input("Stok Produk: "))
    jenis = input("Jenis: ")
    bahan = input("Bahan: ")
    warna = input("Warna: ")
    untuk = input("Untuk: ")
    size = input("Size: ")
    merk = input("Merk: ")
    
    return Baju(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna, untuk, size, merk)


def main():
    products = [
        Baju("P001", "Sweater Hewan", 89000, 15, "Pakaian", "Wol", "Merah", "Anjing", "S", "PettyPaw"),
        Baju("P002", "Jaket Musim Dingin", 120000, 10, "Pakaian", "Katun", "Biru", "Kucing", "M", "CatStyle"),
        Baju("P003", "Kostum Halloween", 75000, 20, "Kostum", "Polyester", "Hitam", "Anjing", "L", "DoggyFashion"),
        Baju("P004", "Raincoat", 95000, 12, "Pakaian", "Waterproof", "Kuning", "Anjing", "M", "PettyPaw"),
        Baju("P005", "Tuxedo Hewan", 150000, 8, "Formal", "Satin", "Hitam", "Kucing", "S", "LuxPet")
    ]
    
    choice = -1
    
    while choice != 0:
        print("\n=== PET SHOP MANAGEMENT SYSTEM ===")
        print("1. Tampilkan Semua Produk")
        print("2. Tambah Produk Baru")
        print("0. Keluar")
        choice = int(input("Pilihan: "))
        
        if choice == 1:
            print("\n=== DAFTAR PRODUK BAJU HEWAN ===")
            display_products(products)
        elif choice == 2:
            products.append(add_new_product())
            print("Produk berhasil ditambahkan!")
        elif choice == 0:
            print("Terima kasih telah menggunakan program ini!")
        else:
            print("Pilihan tidak valid. Silakan coba lagi.")


if __name__ == "__main__":
    main()