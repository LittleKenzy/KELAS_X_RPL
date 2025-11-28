if (true) {
    console.log("jalan kalo benar");
} else {
    console.log("jalan kalo salah");
}

let nilai = 20;
let standar = 60;
let baik = "lulus";
let gagal = "nggak lulus";
let batasAtas = 100;
let batasBawah = 0;
let peringatan = "nilai salah"

if (nilai <= batasAtas && nilai >= batasBawah) {
    if (nilai >= standar) {
        console.log(baik);
    } else {
        console.log(gagal);
    }
} else {
    console.log(peringatan);
}