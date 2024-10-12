(function($){
    class LoadSearch{
        constructor(){
            this.init();
            this.page = 1;
        }
        init(){
            this.load_posts();
        }

        load_categories(){
            let selectedOptions = document.getElementById('categories').selectedOptions;
            let selectedNames = [];

            for (let i = 0; i < selectedOptions.length; i++) {
                let nameValue = selectedOptions[i].getAttribute('name');
                selectedNames.push(nameValue);
            }

            return selectedNames;
        }


        load_posts(){
            $('#simplecharm-advanced-search-form').on('submit', (e) => {
            e.preventDefault();
            let search_term = $('.search-field').val();
            let categories = this.load_categories();
            this.requestPosts(e,search_term,categories,this.page);
        });
        }
        requestPosts(e,search_term,categories,page) {
            let pagination = $('.simplecharm-searchpage-pagination');
                pagination.html('');

            let totalPage = 1;

            let apiUrl = new URL('/wp-json/wp/v2/posts', window.location.origin);
            let params = new URLSearchParams();

            if (search_term) {
                params.append('search', search_term);
            }

            if (categories.length > 0) {
                params.append('categories', categories.join(',')); 
            }

            if(page){
                params.append('page',page);
            }

            $('#simplecharm-loading-overlay').show();

             fetch(apiUrl + '?' + params.toString())
            .then(response => {
                totalPage = response.headers.get('X-WP-TotalPages');
                return response.json()
            })
            .then(posts => {
                let resultsContainer = $('#simplecharm-search-page');
                resultsContainer.html(''); // Clear previous results

                // Check if there are posts
                if (posts.length > 0) {
                    posts.forEach(post => {
                        let date = new Date(post.date);
                        let options = { year: 'numeric', month: 'long', day: 'numeric' };
                        post.date = date.toLocaleDateString('en-US', options);
                        let postdate = post.date;
                        if((post.title.rendered.length) <= 0){
                            postdate = `<a href="${post.link}">${post.date}</a>`;
                        }

                        let postElement = document.createElement('div');
                        postElement.classList.add(`post-${post.id}`,'simplecharm-text-center', 'simplecharm-content');
                        postElement.innerHTML = `
                <h1 class="post-title">
                    <a href="${post.link}">${post.title.rendered}</a>
                </h1>
                <div class="post-meta">
                    <span class="post-date">
                    ${postdate}
                    </span>
                </div>
                <div class="post-content">
                    ${post.excerpt.rendered}
                </div> `;
            resultsContainer.append(postElement);
                    });
                    if(totalPage > 1){
                        let pagination = $('.simplecharm-searchpage-pagination');
                        pagination.html('');
                        for(let i = 1;i <= totalPage;i++){
                            let pageBtn = document.createElement('a');
                            pageBtn.classList.add(i);
                            pageBtn.classList.add(page == i ? 'active' : 'inactive');
                            pageBtn.innerText = i;
                            pagination.append(pageBtn);
                            pageBtn.addEventListener("click",(e) => {
                                this.page = !(pageBtn.classList[0]) ? 1 : pageBtn.classList[0];
                                this.requestPosts(e,search_term,categories,this.page);
            });
                        }
                    }else{
                        let pagination = $('.simplecharm-searchpage-pagination');
                        pagination.html('');
                    }
                } else {
                    resultsContainer.innerHTML = `<p class="simplecharm-text-center">No search results found for "${search_term}"</p>`;
                }
                $('#simplecharm-loading-overlay').hide();
            })
            .catch(error => {
                console.error('Error fetching posts:', error);
                document.getElementById('simplecharm-search-page').innerHTML = '<p>Error fetching posts.</p>';
                
                $('#simplecharm-loading-overlay').hide();
            });
        }
    }

    new LoadSearch;

})(jQuery)