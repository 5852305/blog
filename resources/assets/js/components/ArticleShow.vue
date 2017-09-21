<template>
    <div class="container single-page-back">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="text-center" v-cloak>{{article.title}}</h1>
                <love v-if="users.login"></love>
                <p class="single-article-author" v-cloak><span><i
                        class="fa fa-user padding-right-10"></i>{{article.user_id}}</span>&nbsp&nbsp<span><i
                        class="fa fa-clock-o padding-right-10"></i>{{article.created_at}}</span></p>
            </div>
            <div class="col-md-10 col-md-offset-1 single-page-bottom">
                <p class="article-blog" v-html="article.content" v-cloak>{{article.content}}</p>
            </div>
        </div>

    </div>
</template>


<script>

    export default{
    props:['users'],
       data:function(){
         return {
             article:[]
         }
       },
       mounted:function(){
          this.$http.get('/api/article/'+this.$route.params.id).then((response)=>{
            this.article=response.data;
          })
       },
       components:{

       }
    }



</script>
