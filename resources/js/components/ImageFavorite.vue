<template>
    <div>
        <expandable-image :src="'/images/'+image.image" class="img-fluid"/>
        <div class="title">
            {{ image.title }}
        </div>
        <div class="description">
            {{ image.description }}
        </div>
        <div class="mt-3" v-if="image.user != null">
            Author: {{ image.user.name }}
        </div>
        <div class="favorite" @click="addToFavorite" v-if="auth != null">
            <i class="fas fa-heart mr-2" v-if="image.favorite"></i>
            <i class="far fa-heart mr-2" v-else></i>
            {{ favoriteCount }}
        </div>
    </div>
</template>

<script>
export default {
    name: "ImageFavorite",
    props: ['image'],
    data() {
        return {
            favoriteCount: '',
            auth: window.Auth,
        }
    },
    methods: {
        addToFavorite() {
            axios.post('/' + this.image.id + '/add-to-favorite').then((data) => {
                this.image.favorite = !this.image.favorite;
                this.favoriteCount = data.data;
            });
        }
    },
    created() {
        this.favoriteCount = this.image.favorites.length
    }
}
</script>

<style scoped>
.favorite {
    cursor: pointer;
}
</style>
