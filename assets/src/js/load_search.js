(function($){
    class LoadSearch{
        constructor(){
            this.init();
            this.page = 1;
            this.allUsers = [];
            this.totalPage = 1;
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
            let selectOptions = $(".simplecharm-select-options");
            let selectDropdownIcon = $(".simplecharm-selectform-dropdown-icon");
            let search_term = $('.search-field').val();
            let categories = this.load_categories();

            if(!selectOptions.hasClass("multiselect-closed")){
                selectOptions.addClass("multiselect-closed");
                selectDropdownIcon.removeClass("multiselect-open");
                selectOptions.addClass("multiselect-hide");
            }
            this.requestPosts(e,search_term,categories,this.page);
        });
        }
        async requestPosts(e,search_term,categories,page) {
            let apiUrl;
            let pagination = $('.simplecharm-searchpage-pagination');
                pagination.html('');
            let endpoint = document.querySelector('link[rel="https://api.w.org/').href;
                apiUrl = endpoint + "wp/v2/posts";
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

            try{
            let resultsContainer = $('#simplecharm-search-page');
            resultsContainer.html('');
            let response;
            if(endpoint.endsWith("rest_route=/")){
                response = await fetch(apiUrl + '&' + params.toString());
            }else{
                response = await fetch(apiUrl + '?' + params.toString());
            }
            this.totalPage = await response.headers.get('X-Wp-Totalpages');
            let posts = await response.json();

            if(posts.code === 'rest_post_invalid_page_number'){
                /**
                 * This Conditional is For Loading Posts From Page 1 if There Is No Page as The Provided page Variable
                 */
                this.requestPosts(e,search_term,categories,1);
            }else{
                if (posts.length > 0) {
                    for(let post of posts) {
                        let date = new Date(post.date);
                        let options = { year: 'numeric', month: 'long', day: 'numeric' };
                        post.date = date.toLocaleDateString('en-US', options);
                        let postdate = post.date;
                        if((post.title.rendered.length) <= 0){
                            postdate = `<a href="${post.link}">${post.date}</a>`;
                        }
                        const userdata = await this.get_user(post.author);

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
                    <span class="post-author">
                        <a href="${userdata.link}">${userdata.username}</a>
                    </span>
                </div>
                <div class="post-content">
                    ${post.excerpt.rendered}
                </div> `;
            resultsContainer.append(postElement);
            
                    }
                    if(this.totalPage > 1){
                        let pagination = $('.simplecharm-searchpage-pagination');
                        pagination.html('');
                        for(let i = 1;i <= this.totalPage;i++){
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
                    resultsContainer[0].innerHTML = `<p class="simplecharm-text-center">No search results found for "${search_term}"</p>`;
                }
                    $('#simplecharm-loading-overlay').hide();
                }
            }catch(error){
                console.error('Error fetching posts:', error);
                document.getElementById('simplecharm-search-page').innerHTML = '<p>Error fetching posts.</p>';
                $('#simplecharm-loading-overlay').hide();
            };
        }
        async get_user(id){
            /**
             * Limiting The Ajax Search for Same User
             */

            if(!(id in this.allUsers)){
                let userDetails = await this.load_user(id);
                this.allUsers[id] = userDetails;
                return userDetails;
            }else{
                return this.allUsers[id];
            }
        }
        async load_user(id){
            const data = new FormData();
            data.append('action', 'simplecharm_get_user_info');
            data.append('user_id', id);

            try{
                const response = await fetch(admin_data.ajax_url, {
                    method: 'POST',
                    body: data
                });
                const result = await response.json();

                if(!result.error){
                    return result
                }
            }catch(error){
                throw error;
            }

            return userdata;
        }
    }

    new LoadSearch;

})(jQuery)