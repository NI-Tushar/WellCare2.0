<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancel | WellCare</title>
    <link rel="stylesheet" href="{{url('Frontend/assets/css/navbar.css')}}">
    <link rel="stylesheet" href="{{url('Frontend/assets/css/successPage.css')}}">
</head>


<body>
    <div class="success_section">
        <div class="success-message">
            <h2><span>Well</span>care</h2>
            <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
                <circle cx="38" cy="38" r="36" />
                <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7" />
            </svg>
            <h1 class="success-message__title">Payment Received</h1>
            <div class="success-message__content">
                <h3>Congratulation!</h3>
                <p>You Became a Pro User of WellCare</p>
                <a href="{{route('user.profile')}}"><button>Dashboard</button></a>
            </div>
        </div>
    </div>
</body>

<script>
    function PathLoader(el) {
    this.el = el;
    this.strokeLength = el.getTotalLength();

    // set dash offset to 0
    this.el.style.strokeDasharray = this.el.style.strokeDashoffset = this.strokeLength;
}

PathLoader.prototype._draw = function (val) {
    this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
};

PathLoader.prototype.setProgress = function (val, cb) {
    this._draw(val);
    if (cb && typeof cb === "function") cb();
};

PathLoader.prototype.setProgressFn = function (fn) {
    if (typeof fn === "function") fn(this);
};

var body = document.body,
    svg = document.querySelector("svg path");

if (svg !== null) {
    svg = new PathLoader(svg);

    setTimeout(function () {
        document.body.classList.add("active");
        svg.setProgress(1);
    }, 200);
}

// document.addEventListener("click", function () {
//     if (document.body.classList.contains("active")) {
//         document.body.classList.remove("active");
//         svg.setProgress(0);
//         return;
//     }
//     document.body.classList.add("active");
//     svg.setProgress(1);
// });

</script>
</html>