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
        <div class="favorite" @click="addToFavorite">
            <i class="fas fa-heart mr-2" v-if="image.favorite"></i>
            <i class="far fa-heart mr-2" v-else></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "ImageFavorite",
    props: ['image'],
    data() {
        return {}
    },
    methods: {
        addToFavorite() {
            axios.post('/' + this.image.id + '/add-to-favorite').then(() => {
                this.image.favorite = !this.image.favorite;
            });
        }
    }
}
</script>

<style scoped>
.favorite {
    cursor: pointer;
}
</style>
