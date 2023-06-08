<!-- ========== Projects Section ========== -->
<section class="projects" id="projects">
    <div class="container">
        <div class="main-title title-right projects__title" data-content="Projects">
            <div class="main-title__number">
                <p>02</p>
            </div>
            <div class="main-title__text">
                <p class="main-title__text-short">My Works</p>
                <p class="main-title__text-long">Some of my past projects</p>
            </div>
        </div>
        <div class="projects__intro intro">
            <h1>"DO what you Love and Love what you DO. This is what I do and I was born to do this. <img alt="Clap" height="30px"
                    src="frontend/images/gif/Clap.gif" width="30px"> "</h1>
            <span>Zaw Hlaing Win</span>
        </div>
        <div class="projects__container">
            <div class="projects__bgText">
                <span>{{ date('Y') }}</span>
                <span>{{ date('Y') }}</span>
                <span>{{ date('Y') }}</span>
                <span>{{ date('Y') }}</span>
                <span>{{ date('Y') }}</span>
                <span>{{ date('Y') }}</span>
                <span>{{ date('Y') }}</span>
                <span>{{ date('Y') }}</span>
            </div>

            @forelse ($projects as $project)
                <div class="project-item">
                    <div class="project_content">
                        <div class="project__img">
                            <img alt="Project Image" src="{{ $project->image }}">
                        </div>
                        <div class="project">
                            <h1 class="project__main-title">{{ $project->title }}</h1>
                            <div>
                                <p class="project__sub-title">Check it out!</p>
                                <a class="project__name line-btn" href="{{ $project->project_link }}">{{ $project->title }}</a>
                            </div>
                            <br>
                            <div>
                                <p class="project__sub-title">Coder &rarr;</p>
                                <p class="project__coder">{{ $project->coder }}</p>
                            </div>
                            <br>
                            <div>
                                <p class="project__sub-title">Overview &rarr;</p>
                                <p class="project__overview">{{ $project->overview }}</p>
                            </div>
                            <br>
                            <div>
                                <p class="project__sub-title">Project Skills &rarr;</p>
                                <div class="project__skills">
                                    @foreach ($project->skills as $skill)
                                        <p class="py-1 link">{{ $skill->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                        <div class="action-btns d-flex gap-2">
                            <x-link-button href="{{ route('projects.edit', $project->id) }}" iconName="fa-edit">
                                Edit
                            </x-link-button>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <x-main-button iconName="fa-trash">
                                    Delete
                                </x-main-button>
                            </form>
                        </div>
                    @endauth
                </div>
            @empty
                <marquee behavior="" direction="right" scrollamount="12">
                    <div class="no-items">
                        <h1>No Project Here!</h1>
                    </div>
                </marquee>
            @endforelse


            <div class="more-project-btn d-flex justify-content-center">
                <x-link-button href="https://github.com/ZawHlaingWin003" iconName="fa-suitcase">
                    More Projects On Github
                </x-link-button>
            </div>
        </div>
    </div>
</section>
