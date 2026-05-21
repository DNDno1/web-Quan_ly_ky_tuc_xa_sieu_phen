
// KTX Manager - Main JS (jQuery 4.0 compatible)
$(document).ready(function () {
 
    // Auto-dismiss alerts after 4 seconds
    setTimeout(function () {
        $('.alert-dismissible').fadeOut(500, function () {
            $(this).remove();
        });
    }, 4000);
 
    // Confirm delete actions
    $(document).on('click', '.btn-delete-confirm', function (e) {
        e.preventDefault();
        const url = $(this).attr('href') || $(this).data('url');
        const item = $(this).data('item') || 'mục này';
 
        if (confirm(`Bạn có chắc chắn muốn xóa ${item}?`)) {
            window.location.href = url;
        }
    });
 
    // Password toggle visibility
    $(document).on('click', '.toggle-password', function () {
        const input = $($(this).data('target'));
        const icon = $(this).find('i');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('bi-eye').addClass('bi-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('bi-eye-slash').addClass('bi-eye');
        }
    });
 
    // Room capacity bar animation
    $('.room-capacity-fill').each(function () {
        const width = $(this).data('width') + '%';
        $(this).css('width', 0).animate({ width: width }, 800);
    });
 
    // Form validation enhancement
    $('form.needs-validation').on('submit', function (e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        $(this).addClass('was-validated');
    });
 
    // Number formatter for price inputs
    $(document).on('input', '.price-input', function () {
        let val = $(this).val().replace(/\D/g, '');
        $(this).val(val);
    });
 
    // DataTable-like search for tables
    $('#tableSearch').on('keyup', function () {
        const query = $(this).val().toLowerCase();
        $('table tbody tr').each(function () {
            const text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(query));
        });
    });
 
    // Tooltip init
    $('[data-bs-toggle="tooltip"]').each(function () {
        new bootstrap.Tooltip(this);
    });
 
    // Bill payment type display
    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
    }
 
    // Animate stats on load
    $('.stat-value[data-count]').each(function () {
        const target = parseInt($(this).data('count'));
        const el = $(this);
        $({ counter: 0 }).animate({ counter: target }, {
            duration: 1000,
            easing: 'swing',
            step: function () {
                el.text(Math.ceil(this.counter).toLocaleString('vi-VN'));
            },
            complete: function () {
                el.text(target.toLocaleString('vi-VN'));
            }
        });
    });
 
    // Smooth scroll
    $('a[href^="#"]').on('click', function (e) {
        const target = $($(this).attr('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: target.offset().top - 80 }, 400);
        }
    });
});