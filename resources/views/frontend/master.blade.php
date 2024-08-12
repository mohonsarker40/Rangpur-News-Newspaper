
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{__('msg.title')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('frontend/img/favicon.ico')}}" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
</head>
<body>

@include('frontend.header')
@yield('content')
@include('frontend.footer')

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>

@yield('script')

{{--social media post share--}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('share-facebook').addEventListener('click', function() {
            sharePost('facebook');
        });

        document.getElementById('share-linkedin').addEventListener('click', function() {
            sharePost('linkedin');
        });

        document.getElementById('share-instagram').addEventListener('click', function() {
            sharePost('instagram');
        });

        document.getElementById('share-youtube').addEventListener('click', function() {
            sharePost('youtube');
        });
    });

    function sharePost(platform) {
        const postUrl = encodeURIComponent(window.location.href);
        const postTitle = encodeURIComponent(document.title);

        let shareUrl = '';

        switch(platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer.php?u=${postUrl}&t=${postTitle}`;
                break;
            case 'linkedin':
                shareUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${postUrl}&title=${postTitle}`;
                break;
            case 'instagram':
                alert("Instagram does not support direct sharing via URL.");
                return;
            case 'youtube':
                shareUrl = `https://www.youtube.com/share?url=${postUrl}`;
                return;
            default:
                return;
        }

        window.open(shareUrl, 'Share Post', 'width=600,height=400');
    }
</script>

{{--for language--}}
<script type="text/javascript">

    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function(){
        window.location.href = url + "?msg="+ $(this).val();
    });

</script>

</body>
</html>