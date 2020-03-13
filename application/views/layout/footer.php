<!-- Footer -->
<footer class="footer mt-auto">
    <div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
        &copy; <?= date("Y")?> <a href="http://instagram.com/ridhoaldiko.tar.xz" class="font-weight-bold ml-1" target="_blank">Ridho Aldiko</a>
        </div>
    </div>
    <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
        <li class="nav-item">
            <a href="https://alfazzasoftware.id/" class="nav-link" target="_blank">Alfazzasoftware</a>
        </li>
        <li class="nav-item">
            <a href="https://twitter.com/alfazzasoftware/" class="nav-link" target="_blank">Twitter</a>
        </li>
        <li class="nav-item">
            <a href="https://www.facebook.com/alfazzasoftware" class="nav-link" target="_blank">Facebook</a>
        </li>
        <li class="nav-item">
            <a href="https://www.instagram.com/alfazzasoftware/" class="nav-link" target="_blank">instagram</a>
        </li>
        </ul>
    </div>
    </div>
</footer>
</div>
</div>
<!--   Core   -->
<script src="<?= base_url();?>assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<!--   Argon JS   -->
<script src="<?= base_url();?>assets/js/argon-dashboard.min.js?v=1.1.0"></script>
<!-- custom js -->
<script>
$('.check-active-publish').on('click', function () {
    const id = $(this).data('id');
    const is_publish = $(this).data('is_publish');
    $.ajax({
        url: "<?= base_url('halaman/changePublish'); ?>",
        type: 'post',
        data: {
            id: id,
            is_publish: is_publish,
        },
        success: function () {
            document.location.href = "<?= base_url('halaman'); ?>"
        }
    });
});

//ambil id halaman
$('.btn-getPage-id').on('click', function () {

const pageId = $(this).data('id');
const pageUrl = $(this).data('url');
$('#deletePage').modal('show');
$('[name="pageId"]').val(pageId);
$('[name="pageUrl"]').val(pageUrl);

})

//hapus halaman
$('.btn-delete-page').on('click', function () {

const pageId = $('#pageId').val();
const pageUrl = $('#pageUrl').val();
$.ajax({
    url: "<?= base_url('halaman/deletePage'); ?>",
    type: 'post',
    data: {
        pageId: pageId,
        pageUrl: pageUrl,
    },

    success: function () {
        document.location.href = "<?= base_url('halaman'); ?>";
    }
});
});

</script>

</body>

</html>