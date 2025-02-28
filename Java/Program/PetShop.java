public class PetShop {
    protected String id;
    protected String namaProduk;
    protected double hargaProduk;
    protected int stokProduk;

    public PetShop(String id, String namaProduk, double hargaProduk, int stokProduk) {
        this.id = id;
        this.namaProduk = namaProduk;
        this.hargaProduk = hargaProduk;
        this.stokProduk = stokProduk;
    }

    public String getId() {
        return this.id;
    }

    public String getNamaProduk() {
        return this.namaProduk;
    }

    public double getHargaProduk() {
        return this.hargaProduk;
    }

    public int getStokProduk() {
        return this.stokProduk;
    }

    public void setId(String id) {
        this.id = id;
    }

    public void setNamaProduk(String namaProduk) {
        this.namaProduk = namaProduk;
    }

    public void setHargaProduk(double hargaProduk) {
        this.hargaProduk = hargaProduk;
    }

    public void setStokProduk(int stokProduk) {
        this.stokProduk = stokProduk;
    }
}