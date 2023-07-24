<x-app-layout title="Home">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Discover a World of Words: Welcome to Our Digital Library!</h4>
                        <p class="card-text">
                            Welcome to our Digital Library! Enjoy an enjoyable reading experience with our diverse and
                            high-quality digital book collection. Here, you can explore and discover a wide range of
                            books from various genres, from fiction to non-fiction, from children's books to scientific
                            publications.
                        </p>
                        <p class="card-text">
                            Start your journey through the world of words and knowledge with just one click! Discover
                            new knowledge, compelling stories, and deep insights in the best books we have to offer.
                            Take advantage of the convenience of our platform to access your favorite books anytime,
                            anywhere.
                        </p>
                        <p class="card-text">
                            Let's start reading! Choose from various book categories or use the buttons below to
                            directly access shortcuts to books.
                        </p>
                        <a href="{{ route('books.index') }}" class="btn btn-primary">Explore Books</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
