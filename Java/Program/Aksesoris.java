public class Aksesoris extends PetShop {
    protected String jenis;
    protected String bahan;
    protected String warna;

    public Aksesoris(String id, String namaProduk, double hargaProduk, int stokProduk,
                   String jenis, String bahan, String warna) {
        super(id, namaProduk, hargaProduk, stokProduk);
        this.jenis = jenis;
        this.bahan = bahan;
        this.warna = warna;
    }

    public String getJenis() {
        return this.jenis;
    }

    public String getBahan() {
        return this.bahan;
    }

    public String getWarna() {
        return this.warna;
    }

    public void setJenis(String jenis) {
        this.jenis = jenis;
    }

    public void setBahan(String bahan) {
        this.bahan = bahan;
    }

    public void setWarna(String warna) {
        this.warna = warna;
    }
}