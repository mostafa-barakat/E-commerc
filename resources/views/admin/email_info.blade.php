<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')

        <div class="main-panel ">
            <div class="content-wrapper">
                <h1 style="font-size:25px">Send Email To : {{ $orderid->email }}</h1>

                <form action="{{ route('admin.send_user_email' , $orderid->id) }}" method="POST" class="w-50">
                    @csrf

                    <div class="mt-5">
                        <label>Email Greeting</label>
                        <input type="text" name="greeting" class="form-control text-primary">
                    </div>
                    <div class="mt-5">
                        <label>Email First Ling</label>
                        <input type="text" name="firstling" class="form-control text-primary">
                    </div>
                    <div class="mt-5">
                        <label>Email Body</label>
                        <input type="text" name="body" class="form-control text-primary">
                    </div>
                    <div class="mt-5">
                        <label>Email Button Name</label>
                        <input type="text" name="button" class="form-control text-primary">
                    </div>
                    <div class="mt-5">
                        <label>Email ULR</label>
                        <input type="text" name="url" class="form-control text-primary">
                    </div>
                    <div class="mt-5">
                        <label>Email Last Ling</label>
                        <input type="text" name="lastling" class="form-control text-primary">
                    </div>
                    <div class="mt-5">
                        <input type="submit" class="btn btn-success p-3" value="Send Email">
                    </div>
                </form>
            </div>
        </div>
    <!-- container-scroller -->
    </div>
    <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
