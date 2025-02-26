#include "Aksesoris.cpp"
#include <string>
using namespace std;

class Baju : public Aksesoris {
private:
    string untuk;
    string size;
    string merk;

public:
    Baju(string id, string nama_produk, double harga_produk, int stok_produk,
         string jenis, string bahan, string warna,
         string untuk, string size, string merk)
        : Aksesoris(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna) {
        this->untuk = untuk;
        this->size = size;
        this->merk = merk;
    }

    ~Baju() {}

    string get_untuk() {
        return this->untuk;
    }

    string get_size() {
        return this->size;
    }

    string get_merk() {
        return this->merk;
    }

    void set_untuk(string untuk) {
        this->untuk = untuk;
    }

    void set_size(string size) {
        this->size = size;
    }

    void set_merk(string merk) {
        this->merk = merk;
    }
};