#include "PetShop.cpp"
#include <string>
using namespace std;

class Aksesoris : public PetShop {
protected:
    string jenis;
    string bahan;
    string warna;

public:
    Aksesoris(string id, string nama_produk, double harga_produk, int stok_produk,
              string jenis, string bahan, string warna)
        : PetShop(id, nama_produk, harga_produk, stok_produk) {
        this->jenis = jenis;
        this->bahan = bahan;
        this->warna = warna;
    }

    ~Aksesoris() {}

    string get_jenis() {
        return this->jenis;
    }

    string get_bahan() {
        return this->bahan;
    }

    string get_warna() {
        return this->warna;
    }

    void set_jenis(string jenis) {
        this->jenis = jenis;
    }

    void set_bahan(string bahan) {
        this->bahan = bahan;
    }

    void set_warna(string warna) {
        this->warna = warna;
    }
};