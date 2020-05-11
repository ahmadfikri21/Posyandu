<footer><p>Copyright &copy; 2020 Posyandu Online</p></footer>
    </div>
    <script>
        function konfirmasiDelete(){
            var result = confirm('Apakah Anda Yakin?');

            if(result){
                alert('data berhasil dihapus!');
            }else{
                alert('data tidak dihapus');
            }
            return result;
        }

        function konfirmasiDeletePasien(){
            var result = confirm('Apakah Anda Yakin? jika anda menghapus data pasien ini, maka riwayat pemeriksaan pasien ini akan ikut terhapus!');

            if(result){
                alert('data berhasil dihapus!');
            }else{
                alert('data tidak dihapus');
            }
            return result;
        }
    </script>
</body>
</html>