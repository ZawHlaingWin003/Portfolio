
@extends('dashboard.master')

@section('custom_css')
<style>
.card-list{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 3rem;
    margin: 2rem 0;
}

.card-item {
    border-radius: 18px;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.9);
    background-color: rgb(23, 21, 28);
    color: #fff;
    text-align: center;
    padding: 30px;
    transform-style: preserve-3d;
    perspective: 1000px;
}

.card-text {
    transform: translateZ(30px);
}
.card-item h1{
    margin: 20px 0;
}
.card-item h1 a{
    padding: 5px 0;
}
.card-text p{
    color: gray;
}
.card-text a.main-btn{
    display: inline-block;
    margin: 10px 0;
}
@media screen and (max-width: 468px){
    .card{
        padding: 0;
        text-align: left;
    }
    .card-list{
        grid-template-columns: 1fr;
    }
    .card-text h1{
        font-size: 20px;
    }
}

</style>
@endsection

@section('content')

<div class="card-list">
    <div class="card-item">
        <div class="card-text">
            <h1><a href="{{ route('admin_users.index') }}" class="line-btn"><i class="fa fa-user"></i> Admin Users</a></h1>
            <p>You can check admin users who can control the website. But withour anyone permission, don't delete or edit their private information.</p>
            <a href="{{ route('admin_users.index') }}" class="main-btn">Check More &rarr;</a>
        </div>
    </div>
    <div class="card-item">
        <div class="card-text">
            <h1><a href="{{ route('projects.index') }}" class="line-btn"><i class="fa fa-briefcase"></i> Projects</a></h1>
            <p>Here are show-off projects which is made by Coder ZawGyi. You can CRUD the projects.</p>
            <a href="{{ route('projects.index') }}" class="main-btn">Check More &rarr;</a>
        </div>
    </div>
    <div class="card-item">
        <div class="card-text">
            <h1><a href="{{ route('blogs.list') }}" class="line-btn"><i class="fa fa-book"></i> Blogs</a></h1>
            <p>Make a new blog and share your knowledge to junior web developer. You can also add Tidbits which concern with Coding.</p>
            <a href="{{ route('blogs.list') }}" class="main-btn">Check More &rarr;</a>
        </div>
    </div>
</div>

@endsection

