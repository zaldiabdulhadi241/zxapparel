import Swal from "https://cdn.jsdelivr.net/npm/sweetalert2@11";

console.log("Tes");

Swal.fire({
  title: "Berhasil Login",
  text: "Tes",
  timer: 5000,
}).then(() => {
  window.location = "https://google.com";
});

alert('Hello').then(() => {window.location = '../admin/'});