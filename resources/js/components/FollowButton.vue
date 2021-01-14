<template>
  <div>
    <button class="btn btn-primary follow" @click="subscribeUser" :user="user">
      {{ buttonText }}
    </button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],
  data() {
    return {
      user: this.userId,
      status: this.follows,
      buttonText: "",
    };
  },
  mounted() {
    if (this.status == undefined) {
      this.buttonText = "Unfollow";
    } else if (this.status == false) {
      this.buttonText = "Follow";
    } else if (this.status == true) {
      this.buttonText = "Unfollow";
    }
  },
  methods: {
    subscribeUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          this.status = !this.status;
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    },
  },
  watch: {
    status: function () {
      this.buttonText = this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>