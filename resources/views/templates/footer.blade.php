</div>
<!-- End of Content Wrapper -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center text-muted my-auto">
            <span>
                برنامه نویس:
                <a href="https://edrisranjbar.ir" target="_blank">
                    <strong>ادریس رنجبر</strong>
                </a>
            </span>
        </div>
    </div>
</footer>

</div>
<!-- End of Page Wrapper -->

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
<script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>
<script>
    // live search
    $(document).ready(function () {
        let notFoundTag = `<tr class="not-found text-center"><td colspan="6">نتیجه ای یافت نشد</td></tr>`;
        $("table tbody").append(notFoundTag);
        $('.not-found').hide();
        $("#searchInput").on("keyup", function () {
            let value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                if ($("table tbody tr:visible").length > 0) {
                    $('.not-found').hide();
                } else {
                    $('.not-found').show();
                }
            });
        });
    });

    $('.money').simpleMoneyFormat();
    $('form').prop('autocomplete', "off");
    // Initialize select2
    $("#user").select2();
    // Read selected option
    $('#but_read').click(function () {
        var username = $('#user option:selected').text();
        var userid = $('#user').val();
        $('#result').html("id : " + userid + ", name : " + username);
    });
</script>
<script src="{{asset('assets/js/money.js')}}"></script>
<script src="{{asset('assets/js/date_formatter.js')}}"></script>
<script>
    function formatNumberToEnglish(number) {
        number = number.replaceAll(/۰/g, "0");
        number = number.replaceAll(/۱/g, "1");
        number = number.replaceAll(/۲/g, "2");
        number = number.replaceAll(/۳/g, "3");
        number = number.replaceAll(/۴/g, "4");
        number = number.replaceAll(/۵/g, "5");
        number = number.replaceAll(/۶/g, "6");
        number = number.replaceAll(/۷/g, "7");
        number = number.replaceAll(/۸/g, "8");
        number = number.replaceAll(/۹/g, "9");
        return number;
    }

    $(document).ready(function () {

        // Format dates
        document.querySelectorAll('.date').forEach((element) => {
            element.innerHTML = formatNumberToEnglish(formatDate(element.innerHTML));
        });

    });
</script>
<script src="{{asset('assets/js/persian-date.min.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>