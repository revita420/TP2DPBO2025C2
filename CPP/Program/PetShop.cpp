#include <iostream>
#include <string>
using namespace std;

class PetShop {
protected:
    string id;
    string nama_produk;
    double harga_produk;
    int stok_produk;

public:
    PetShop(string id, string nama_produk, double harga_produk, int stok_produk) {
        this->id = id;
        this->nama_produk = nama_produk;
        this->harga_produk = harga_produk;
        this->stok_produk = stok_produk;
    }

    ~PetShop() {}

    string get_id() {
        return this->id;
    }

    string get_nama_produk() {
        return this->nama_produk;
    }

    double get_harga_produk() {
        return this->harga_produk;
    }

    int get_stok_produk() {
        return this->stok_produk;
    }

    void set_id(string id) {
        this->id = id;
    }

    void set_nama_produk(string nama_produk) {
        this->nama_produk = nama_produk;
    }

    void set_harga_produk(double harga_produk) {
        this->harga_produk = harga_produk;
    }

    void set_stok_produk(int stok_produk) {
        this->stok_produk = stok_produk;
    }
};