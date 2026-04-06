package com.mycompany.overloading;

/*
 * Demonstrasi Method Overloading dengan nama method "Perkalian"
 */
public class PerkalianOverloading {

    // Method 1: Perkalian 2 bilangan bulat (int)
    public static int Perkalian(int a, int b) {
        return a * b;
    }

    // Method 2: Perkalian 3 bilangan bulat (int)
    public static int Perkalian(int a, int b, int c) {
        return a * b * c;
    }

    // Method 3: Perkalian 2 bilangan pecahan (double)
    public static double Perkalian(double a, double b) {
        return a * b;
    }

    // Method main untuk menjalankan dan menguji
    public static void main(String[] args) {
        // Memanggil method Perkalian dengan 2 parameter int
        int hasil1 = Perkalian(5, 10);
        System.out.println("Perkalian 5 * 10 = " + hasil1);

        // Memanggil method Perkalian dengan 3 parameter int
        int hasil2 = Perkalian(2, 3, 4);
        System.out.println("Perkalian 2 * 3 * 4 = " + hasil2);

        // Memanggil method Perkalian dengan 2 parameter double
        double hasil3 = Perkalian(2.5, 4.0);
        System.out.println("Perkalian 2.5 * 4.0 = " + hasil3);
    }
}