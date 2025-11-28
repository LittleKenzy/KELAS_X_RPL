const objek = {
    nama: "Bilal",
    telp: 2490823,
    buah: ['apel', 'jeruk', 'pisang'],
    coba: function () {
        return "coba function di dalam objek";
    },
    boleh: true,
    "tulis": 1234,
};

console.log(objek.nama);
console.log(objek.telp);
console.log(objek.boleh);
console.log(objek.coba());
console.log(objek.buah[1]);
console.log(objek["tulis"]);