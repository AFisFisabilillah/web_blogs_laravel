<x-layout>
    <x-slot:title> {{ $title }} </x-slot:title>



    <!-- <article class="max-w-screen-md py-8 border-b border-gray-300">

            <h1 class="text-3xl tracking-tight font-bold mb-1 text-gray-900"> {{ $post['title'] }} </h1>
            <p class="text-base text-gray-500 hover:underline"><a href="/author/{{ $post->author->id }}">  {{ $post->author->name }} </a> | {{ $post->created_at->diffForHumans() }}</p>
            <p class="my-4 font-light text-wrap"> {{$post['content']}} </p>
            <a href="/blogs " class="font-medium text-blue-500 underline ">&laquo Read More </a>
        </article> -->

    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $post->author->name }}
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO
                                    Flowbite</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08" title="February 8th, 2022">{{ $post->created_at->format('d F Y') }}</time></p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                       {{ $post->title }}
                    </h1>
                </header>

                <p>
                    {{ $post->content }}
                </p>
                

            </article>
        </div>
    </main>


</x-layout>