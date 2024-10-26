</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Desa Oematnunu</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<script src="../assets/lightbox2/js/lightbox-plus-jquery.js"></script>
<script src="../assets/lightbox2/js/lightbox.js"></script>
<!-- <script src="../assets/js/script.js"></script> -->
<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>
<!-- jquery datatables -->

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>

<script>
$(document).ready(function() {
    var tables = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [
            [5, 10, 15, 20, 100, -1],
            [5, 10, 15, 20, 100, "All"]
        ],
        "scrollX": true,
        "scrollY": true,
    });

    var tableAlt = $('#dataAlternatif').DataTable({
        responsive: true,
        "lengthMenu": [
            [5, 10, 15, 20, 100, -1],
            [5, 10, 15, 20, 100, "All"]
        ],
        "scrollX": true,
        "scrollY": true,
    });

    var table = $('#dataKepalaKeluarga').DataTable({
        responsive: true,
        "lengthMenu": [
            [10, 50, 100, 150, 200, -1],
            [10, 50, 100, 150, 200, "All"]
        ],
        "scrollX": true,
        "scrollY": true,
    });

    var tableAlternatifUtilitas = $('#dataAlternatifUtilitas').DataTable({
        responsive: true,
        "lengthMenu": [
            [10, 50, 100, 150, 200, -1],
            [10, 50, 100, 150, 200, "All"]
        ],
        "scrollX": true,
        "scrollY": true,
    });

    var tableAlternatifPreferensi = $('#tableAlternatifPreferensi').DataTable({
        responsive: true,
        "lengthMenu": [
            [10, 50, 100, 150, 200, -1],
            [10, 50, 100, 150, 200, "All"]
        ],
        "scrollX": true,
        "scrollY": true,
    });

    var dataHasil = $('#dataHasil').DataTable({
        responsive: true,
        "lengthMenu": [
            [10, 50, 100, 150, 200, -1],
            [10, 50, 100, 150, 200, "All"]
        ],
        "scrollX": true,
        "scrollY": true,
        layout: {
            topStart: {
                buttons: ['excelHtml5', 'pdfHtml5']
            }
        }
    });


    $('#filter-periode-hasil').on('change', function() {
        var filterValue = $(this).val();
        var defaultTitle = "SPK Penentuan Penerima Rumah Bantuan";

        if (filterValue) {
            // Tambahkan periode pada title
            document.title = defaultTitle + " - Periode " + filterValue;
            // Filter berdasarkan kolom "Jenis Barang"
            dataHasil.column(4).search(filterValue).draw(); // Kolom ke-4 adalah "Jenis Barang"
        } else {
            // Jika tidak ada filter yang dipilih, tampilkan title default dan semua data
            document.title = defaultTitle;
            dataHasil.column(4).search('').draw();
        }
    });



    $('#filter-periode').on('change', function() {
        var filterValue = $(this).val();

        if (filterValue) {
            // Filter berdasarkan kolom "Jenis Barang"
            tableAlt.column(4).search(filterValue).draw(); // Kolom ke-4 adalah "Jenis Barang"
        } else {
            // Jika tidak ada filter yang dipilih, tampilkan semua data
            tableAlt.column(4).search('').draw();
        }
    });
});
</script>

</body>

</html>