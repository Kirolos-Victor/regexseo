<template>
    <div class="my-container overflow-auto">
        <div class="d-flex justify-content-start mb-5" v-if="auth !=null && auth.is_admin ===1">
            <a href="/admin/approve" class="btn btn-secondary">Approve images</a>
        </div>
        <div class="row">
            <div class="col-lg-2 col-sm-12 col-md-4" v-for="image in images">
                <image-favorite :image="image"></image-favorite>
            </div>
        </div>

        <div class="d-flex justify-content-center" v-if="nextPage !=null" v-observe-visibility="getImages">
            <!--            <button class="load-more-button" @click.prevent="getImages">LOAD MORE</button>-->
        </div>
        <div class="d-flex justify-content-center mt-5" v-if="loader">
            <div class="loader"></div>
        </div>
    </div>

</template>

<script>
import ImageFavorite from "../components/ImageFavorite";

export default {
    name: "MainPage",
    components: {ImageFavorite},
    data() {
        return {
            images: [],
            nextPage: null,
            loader: false,
            auth: window.Auth
        }
    },
    methods: {
        getImages() {
            this.loader = true;
            let url;
            if (this.nextPage == null) {
                url = '/get-images';
            } else {
                url = '/get-images?page=' + this.nextPage;
            }
            axios.post(url).then((data) => {
                this.nextPage = data.data.next_page_url !== null ? data.data.next_page_url.substring(data.data.next_page_url.indexOf('=') + 1) : null;
                this.images = this.images.concat(data.data.data);
                this.loader = false;
            })
        }
    },
    mounted() {
        this.getImages();
    }
}
</script>
