import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    private static void displayTableHeader() {
        System.out.println("+" + "-".repeat(6) + "+" + "-".repeat(20) + "+" + "-".repeat(15) + "+"
                + "-".repeat(12) + "+" + "-".repeat(15) + "+" + "-".repeat(15) + "+"
                + "-".repeat(15) + "+" + "-".repeat(15) + "+" + "-".repeat(10) + "+"
                + "-".repeat(15) + "+");

        System.out.printf("| %-4s | %-18s | %-13s | %-10s | %-13s | %-13s | %-13s | %-13s | %-8s | %-13s |\n",
                "ID", "Nama Produk", "Harga", "Stok", "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk");

        System.out.println("+" + "-".repeat(6) + "+" + "-".repeat(20) + "+" + "-".repeat(15) + "+"
                + "-".repeat(12) + "+" + "-".repeat(15) + "+" + "-".repeat(15) + "+"
                + "-".repeat(15) + "+" + "-".repeat(15) + "+" + "-".repeat(10) + "+"
                + "-".repeat(15) + "+");
    }

    private static void displayTableFooter() {
        System.out.println("+" + "-".repeat(6) + "+" + "-".repeat(20) + "+" + "-".repeat(15) + "+"
                + "-".repeat(12) + "+" + "-".repeat(15) + "+" + "-".repeat(15) + "+"
                + "-".repeat(15) + "+" + "-".repeat(15) + "+" + "-".repeat(10) + "+"
                + "-".repeat(15) + "+");
    }

    private static void displayProducts(ArrayList<Baju> products) {
        displayTableHeader();

        for (Baju product : products) {
            System.out.printf("| %-4s | %-18s | Rp %-10.2f | %-10d | %-13s | %-13s | %-13s | %-13s | %-8s | %-13s |\n",
                    product.getId(), product.getNamaProduk(), product.getHargaProduk(), product.getStokProduk(),
                    product.getJenis(), product.getBahan(), product.getWarna(),
                    product.getUntuk(), product.getSize(), product.getMerk());
        }

        displayTableFooter();
    }

    private static Baju addNewProduct(Scanner scanner) {
        String id, namaProduk, jenis, bahan, warna, untuk, size, merk;
        double hargaProduk;
        int stokProduk;

        System.out.println("\n=== Tambah Produk Baru ===");
        
        System.out.print("ID: ");
        id = scanner.nextLine();
        
        System.out.print("Nama Produk: ");
        namaProduk = scanner.nextLine();
        
        System.out.print("Harga Produk: ");
        hargaProduk = scanner.nextDouble();
        
        System.out.print("Stok Produk: ");
        stokProduk = scanner.nextInt();
        scanner.nextLine(); 
        
        System.out.print("Jenis: ");
        jenis = scanner.nextLine();
        
        System.out.print("Bahan: ");
        bahan = scanner.nextLine();
        
        System.out.print("Warna: ");
        warna = scanner.nextLine();
        
        System.out.print("Untuk: ");
        untuk = scanner.nextLine();
        
        System.out.print("Size: ");
        size = scanner.nextLine();
        
        System.out.print("Merk: ");
        merk = scanner.nextLine();

        return new Baju(id, namaProduk, hargaProduk, stokProduk, jenis, bahan, warna, untuk, size, merk);
    }

    public static void main(String[] args) {
        ArrayList<Baju> products = new ArrayList<>();
        
        products.add(new Baju("P001", "Sweater Hewan", 89000, 15, "Pakaian", "Wol", "Merah", "Anjing", "S", "PettyPaw"));
        products.add(new Baju("P002", "Jaket Musim Dingin", 120000, 10, "Pakaian", "Katun", "Biru", "Kucing", "M", "CatStyle"));
        products.add(new Baju("P003", "Kostum Halloween", 75000, 20, "Kostum", "Polyester", "Hitam", "Anjing", "L", "DoggyFashion"));
        products.add(new Baju("P004", "Raincoat", 95000, 12, "Pakaian", "Waterproof", "Kuning", "Anjing", "M", "PettyPaw"));
        products.add(new Baju("P005", "Tuxedo Hewan", 150000, 8, "Formal", "Satin", "Hitam", "Kucing", "S", "LuxPet"));

        try (Scanner scanner = new Scanner(System.in)) {
            int choice;
            
            do {
                System.out.println("\n=== PET SHOP MANAGEMENT SYSTEM ===");
                System.out.println("1. Tampilkan Semua Produk");
                System.out.println("2. Tambah Produk Baru");
                System.out.println("0. Keluar");
                System.out.print("Pilihan: ");
                choice = scanner.nextInt();
                scanner.nextLine(); 

                switch (choice) {
                    case 1 -> {
                        System.out.println("\n=== DAFTAR PRODUK BAJU HEWAN ===");
                        displayProducts(products);
                    }
                    case 2 -> {
                        products.add(addNewProduct(scanner));
                        System.out.println("Produk berhasil ditambahkan!");
                    }
                    case 0 -> System.out.println("Terima kasih telah menggunakan program ini!");
                    default -> System.out.println("Pilihan tidak valid. Silakan coba lagi.");
                }
            } while (choice != 0);
        } 
    }
}