<script>
    let currency = ' €';
    @if(session()->has('currency'))
        currency = ' ' + '{!! session('currency') !!}'
    @endif;
    let min = 0;
    let maxRange = 350;
    let max = maxRange
    if (currency == ' €') maxRange = 2000;
    @if(isset($priceFrom))
        min = {!! $priceFrom !!};
    @endif
        @if(isset($priceTo))
        max = {!! $priceTo !!};
    @endif
    // Initialize slider:
    $(document).ready(function () {
        $('.noUi-handle').on('click', function () {
            $(this).width(50);
        });
        var rangeSlider = document.getElementById('slider-range');
        var moneyFormat = wNumb({
            decimals: 0,
            thousand: '',
        });
        noUiSlider.create(rangeSlider, {
            start: [min, max],
            step: 1,
            range: {
                'min': [0],
                'max': [maxRange]
            },
            format: moneyFormat,
            connect: true
        });

        // Set visual min and max values and also update value hidden form inputs
        rangeSlider.noUiSlider.on('update', function (values, handle) {
            document.getElementById('slider-range-value1').innerHTML = values[0] + currency;
            document.getElementById('slider-range-value2').innerHTML = values[1] + currency;
            document.getElementsByName('price_from').value = moneyFormat.from(
                values[0]);
            document.getElementsByName('price_to').value = moneyFormat.from(
                values[1]);
            let min = values[0];
            let max = values[1];
            document.getElementById('minPrice').value = min;
            document.getElementById('maxPrice').value = max;
        });

        var rangeSliderMobile = document.getElementById('slider-range-mobile');
        var moneyFormatMobile = wNumb({
            decimals: 0,
            thousand: '',
        });
        noUiSlider.create(rangeSliderMobile, {
            start: [min, max],
            step: 10,
            range: {
                'min': [0],
                'max': [maxRange]
            },
            format: moneyFormatMobile,
            connect: true
        });

        // Set visual min and max values and also update value hidden form inputs
        rangeSliderMobile.noUiSlider.on('update', function (values, handle) {
            document.getElementById('slider-range-value1-mobile').innerHTML = values[0] + currency;
            document.getElementById('slider-range-value2-mobile').innerHTML = values[1] + currency;
            document.getElementsByName('price_from').value = moneyFormat.from(
                values[0]);
            document.getElementsByName('price_to').value = moneyFormat.from(
                values[1]);
            let min = values[0];
            let max = values[1];
            document.getElementById('minPriceMobile').value = min;
            document.getElementById('maxPriceMobile').value = max;
        });


    });

    function openSubcategories(icon, parentId, id) {
        if ($(parentId).hasClass('collapsed')) {
            $(parentId).removeClass('collapsed');
            $(id).removeClass('hide');
            $(id).addClass('show');
            if (icon != null) {
                $(icon).html('&#xf106;');
            }
        } else {
            $(parentId).addClass('collapsed');
            $(id).removeClass('show');
            $(id).addClass('hide');
            if (icon != null) {
                $(icon).html('&#xf107;');
            }

        }
    }

    (function () {
        let filterTitles = document.querySelectorAll('.selected-text')
        filterTitles.forEach(ft => {
            let filterTitle = ft.parentElement.parentElement.previousElementSibling;
            if (filterTitle.classList.contains('collapsed')) {
                filterTitle.click();
            }
        })
    })()

</script>
