#include "Baju.cpp"
#include <iostream>
#include <vector>
#include <iomanip>
using namespace std;

void displayTableHeader() {
    cout << "+" << string(6, '-') << "+" << string(20, '-') << "+" << string(15, '-') << "+"
         << string(12, '-') << "+" << string(15, '-') << "+" << string(15, '-') << "+"
         << string(15, '-') << "+" << string(15, '-') << "+" << string(10, '-') << "+"
         << string(15, '-') << "+" << endl;

    cout << "| " << left << setw(4) << "ID" << " | "
         << setw(18) << "Nama Produk" << " | "
         << setw(13) << "Harga" << " | "
         << setw(10) << "Stok" << " | "
         << setw(13) << "Jenis" << " | "
         << setw(13) << "Bahan" << " | "
         << setw(13) << "Warna" << " | "
         << setw(13) << "Untuk" << " | "
         << setw(8) << "Size" << " | "
         << setw(13) << "Merk" << " |" << endl;

    cout << "+" << string(6, '-') << "+" << string(20, '-') << "+" << string(15, '-') << "+"
         << string(12, '-') << "+" << string(15, '-') << "+" << string(15, '-') << "+"
         << string(15, '-') << "+" << string(15, '-') << "+" << string(10, '-') << "+"
         << string(15, '-') << "+" << endl;
}

void displayTableFooter() {
    cout << "+" << string(6, '-') << "+" << string(20, '-') << "+" << string(15, '-') << "+"
         << string(12, '-') << "+" << string(15, '-') << "+" << string(15, '-') << "+"
         << string(15, '-') << "+" << string(15, '-') << "+" << string(10, '-') << "+"
         << string(15, '-') << "+" << endl;
}

void displayProducts(const vector<Baju>& products) {
    displayTableHeader();

    for (const auto& product : products) {
        Baju& nonConstProduct = const_cast<Baju&>(product);
        
        cout << "| " << left << setw(4) << nonConstProduct.get_id() << " | "
             << setw(18) << nonConstProduct.get_nama_produk() << " | "
             << "Rp " << setw(10) << fixed << setprecision(2) << nonConstProduct.get_harga_produk() << " | "
             << setw(10) << nonConstProduct.get_stok_produk() << " | "
             << setw(13) << nonConstProduct.get_jenis() << " | "
             << setw(13) << nonConstProduct.get_bahan() << " | "
             << setw(13) << nonConstProduct.get_warna() << " | "
             << setw(13) << nonConstProduct.get_untuk() << " | "
             << setw(8) << nonConstProduct.get_size() << " | "
             << setw(13) << nonConstProduct.get_merk() << " |" << endl;
    }

    displayTableFooter();
}

Baju addNewProduct() {
    string id, nama_produk, jenis, bahan, warna, untuk, size, merk;
    double harga_produk;
    int stok_produk;

    cout << "\n=== Tambah Produk Baru ===" << endl;
    
    cout << "ID: ";
    cin >> id;
    cin.ignore();
    
    cout << "Nama Produk: ";
    getline(cin, nama_produk);
    
    cout << "Harga Produk: ";
    cin >> harga_produk;
    
    cout << "Stok Produk: ";
    cin >> stok_produk;
    cin.ignore();
    
    cout << "Jenis: ";
    getline(cin, jenis);
    
    cout << "Bahan: ";
    getline(cin, bahan);
    
    cout << "Warna: ";
    getline(cin, warna);
    
    cout << "Untuk: ";
    getline(cin, untuk);
    
    cout << "Size: ";
    getline(cin, size);
    
    cout << "Merk: ";
    getline(cin, merk);

    return Baju(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna, untuk, size, merk);
}

int main() {
    vector<Baju> products = {
        Baju("P001", "Sweater Hewan", 89000, 15, "Pakaian", "Wol", "Merah", "Anjing", "S", "PettyPaw"),
        Baju("P002", "Jaket Musim Dingin", 120000, 10, "Pakaian", "Katun", "Biru", "Kucing", "M", "CatStyle"),
        Baju("P003", "Kostum Halloween", 75000, 20, "Kostum", "Polyester", "Hitam", "Anjing", "L", "DoggyFashion"),
        Baju("P004", "Raincoat", 95000, 12, "Pakaian", "Waterproof", "Kuning", "Anjing", "M", "PettyPaw"),
        Baju("P005", "Tuxedo Hewan", 150000, 8, "Formal", "Satin", "Hitam", "Kucing", "S", "LuxPet")
    };

    int choice;
    
    do {
        cout << "\n=== PET SHOP MANAGEMENT SYSTEM ===" << endl;
        cout << "1. Tampilkan Semua Produk" << endl;
        cout << "2. Tambah Produk Baru" << endl;
        cout << "0. Keluar" << endl;
        cout << "Pilihan: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "\n=== DAFTAR PRODUK BAJU HEWAN ===" << endl;
                displayProducts(products);
                break;
            case 2:
                products.push_back(addNewProduct());
                cout << "Produk berhasil ditambahkan!" << endl;
                break;
            case 0:
                cout << "Terima kasih telah menggunakan program ini!" << endl;
                break;
            default:
                cout << "Pilihan tidak valid. Silakan coba lagi." << endl;
        }
    } while (choice != 0);

    return 0;
}