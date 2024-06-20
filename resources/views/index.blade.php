@extends('layout')

@section('content')
    <div class="main__cards">

    </div>
    <div class="articles__pagination">

    </div>
    <script>
        let currentPage = 1;
        let totalPages = 0;

        function loadBlogs(page = 1) {
            $.post('/get/blogs', { _token: $('meta[name="csrf-token"]').attr('content'), page: page }).then(e => {
                if (e.success) {
                    let cards = '';
                    e.data.forEach(item => {
                        let createdAt = new Date(item.created_at);
                        let formattedDate = createdAt.toLocaleDateString('ru-RU', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        cards += `
                    <a href="/article/${item.id}" class="articles__card">
                        <img src="${item.image}" alt="${item.title}" class="article__img">
                        <div class="article__created">${formattedDate}</div>
                        <div class="article__title">${item.title}</div>
                        <div class="article__description">
                            ${item.description}
                        </div>
                    </a>
                `;
                    });
                    $('.main__cards').html(cards);
                    $('.articles__card').css('opacity', 0).animate({ opacity: 1, transform: 'translateY(0)' }, 500);
                    currentPage = e.currentPage;
                    totalPages = e.totalPages;
                    renderPagination();
                }
                if (e.error) {
                    $(this).attr('disabled', false);
                    return notify('Error', 'error');
                }
            });
        }

        function renderPagination() {
            let paginationHtml = '';
            for (let i = 1; i <= totalPages; i++) {
                paginationHtml += `<button class="pagination__btn" data-page="${i}" onclick="loadBlogs(${i})">${i}</button>`;
            }
            $('.articles__pagination').html(paginationHtml);

            $('.pagination__btn').removeClass('active');
            $(`.pagination__btn[data-page="${currentPage}"]`).addClass('active');
        }

        loadBlogs();
    </script>
@endsection
