<template>
  <transition 
      enter-to-class="transform opacity-100 scale-100"
      leave-class="transform opacity-100 scale-100"
      id="postFormComponent">
    <div class="relative">
      <loading v-show="isLoadingCreatePost" :type="loader.type[0]" :withLoading="true"></loading>
      <div class="r-field-required grid gap-y-5">
        <div>
          <label class="grid gap-y-2">
            <span class="font-bold">{{ lang.get('words.Title') }} *</span>
            <input v-model.trim="$v.form.title.$model" class="h-14 rounded-lg bg-b-input border-b-input focus:placeholder:opacity-0" type="text" placeholder="Title"/>
          </label>
          <div class="errors">
            <error-input :name="'title'" :validations="['required', 'max.string', 'min.string']"></error-input>
          </div>
        </div>
        <div class="grid gap-2">
          <label class="grid gap-y-2"><span class="font-bold">{{ lang.get('words.SelectACategory') }} *</span></label>
          <multiselect v-model.trim="$v.form.category_id.$model"
          :options="categories"
          :custom-label="categoryOption"
          :allow-empty="false"
          trackBy="id"
          placeholder="Select one"
          selectedLabel="Selected"
          deselectLabel="Remove"
          openDirection=""
          :preselectFirst="true"
          :loading="_.isEmpty(categories)">
            <!-- <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template> -->
            <template slot="singleLabel" slot-scope="props">{{ categories[props.option-1].title }}</template>
            <template slot="option" slot-scope="props">{{ props.option.title }}</template>
          </multiselect>
          <div class="errors">
            <error-input :name="'category_id'" :validations="['required']"></error-input>
          </div>
        </div>
        <div class="grid gap-2">
          <label class="grid gap-y-2"><span class="font-bold">{{ lang.get('words.Tags') }}</span></label>
          <multiselect v-model.trim="$v.form.tags.$model"
          :multiple="true"
          :taggable="true"
          :options="tag_opt"
          :custom-label="tagOption"
          :allow-empty="false"
          :close-on-select="false"
          :clear-on-select="false"
          :limit="3"
          :limit-text="limitText"
          trackBy="id"
          placeholder="Search or add a tag"
          tag-placeholder="Add this as new tag"
          selectedLabel="Selected"
          deselectLabel="Remove"
          openDirection=""
          :preselectFirst="true"
          :loading="_.isEmpty(tags)"
          @tag="addTag">
            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ form.tags.length }} options selected</span></template>
            <template slot="option" slot-scope="props">{{ props.option.title }}</template>
          </multiselect>
          <div class="errors">
            <error-input :name="'category_id'" :validations="['required']"></error-input>
          </div>
        </div>
        <div class="grid gap-2">
          <label class="grid gap-y-2">
            <span class="font-bold">{{ lang.get('words.PlainDescription') }}  *</span>
          </label>
          <ckeditor :editor="CKEditor.editor" v-model.trim="$v.form.plain_description.$model"></ckeditor>
          <div class="errors">
            <error-input :name="'plain_description'" :validations="['required']"></error-input>
          </div>
        </div>
      </div>
      <ui-button @click.prevent="submit" :type="'create'" :size="'full'" :withLoading="loading" :disabled="anyError" class="text-white mt-2">
        <span class="font-bold">{{ lang.get('words.Submit') }}</span>
      </ui-button>
    </div>
  </transition>
</template>
<script>
import Vue from "vue";
import { getters, mutations, actions } from "../../store";
import { required, minLength, maxLength, sameAs, email, helpers } from 'vuelidate/lib/validators'

export default {
  props: {
    categories: {
      type: Array,
      default: []
    },
    tags: {
      type: Array,
      default: []
    }
  },
  data() {
    return {
      form: {
        title: '',
        plain_description: '',
        category_id: null,
        tags: []
      },
      tag_opt: [],
      errors: {},
      isDirty: false,
      isLoadingCreatePost: false
    };
  },
  validations: {
    form: {
      title: {
        required, minLength: minLength(2), maxLength: maxLength(100)
      },
      plain_description: {
        required
      },
      category_id: {
        required
      },
      tags: {
      }
    }
  },
  computed: {
    ...getters,
    inputTitle: function() { return this.$v.form.title.$error },
    inputPlainDescription: function() { return this.$v.form.plain_description.$error},
    categoryId: function() { return this.$v.form.category_id.$model },
    title: function({title}) { return title },
    isInvalid: function() {
      return _.values(this.form).some((v) => {
        return v == null || v == ''
      });
    },
    anyError: function() {
      return this.$v.form.$anyError || _.values(
        this._.omit(this.form, ['tags']) // except tags
      ).some((v) => v == null || v == '' );
    },
    formData: function() {
      let formData = this.form;
      return formData;
    }
  },
  methods: {
    ...mutations, ...actions,
    submit() {
      this.isLoadingCreatePost = true;
      this.errors = null;

      this.$http.post('api/posts', this.formData)
      .then( (response) => {
        if (_.has(response, "data.errors")) {
            this.errors = response.data.errors;
          } else if (_.has(response, "data.exception")) {
            let alertData = {
              showAlert: true,
              type: "error",
              message:
                "Sorry our server has problem at the moment. Please come back later. Thank you.",
            };
            mutations.setAlert(alertData);
          } else {
            let alertData = {
              showAlert: true,
              type: "success",
              message:
                "Your post has been created.",
            };
            mutations.setAlert(alertData);
            this.$emit('getPosts')
            this.$emit('hidePostCreate')
          }
       })
      .finally(() => {
        this.isLoadingCreatePost = false;
        //
      })
    },
    categoryOption: function ({id, title}) {
      return title
    },
    tagOption: function ({id, title}) {
      return title
    },
    addTag (newTag) {
      const tag = {
        title: newTag[0] == '#'? newTag : '#' + newTag
      };
      this.tag_opt.push(tag)
      this.form.tags.push(tag)
    },
    limitText (count) {
      return `+ ${count} more`
    },
  },
  watch: {
      inputTitle: {
          handler(value) {
            this.errors.title = null
          }
      },
      form: {
          handler(value) {
            if(!this.isDirty) {
              this.isDirty = true
            }
          },
          deep: true
      },
      categoryId: {
          handler(value) {
            if(value) {
              this.$v.form.category_id.$model = this._.get(value, 'id', value);
              this.form.category_id = this._.get(value, 'id', value);
            }
          },
          deep: true
      },
      tags: {
        handler() {
          this.tag_opt = this.tags;
        },
        deep: true
      },
      immediate: true,
      deep: true
  }
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped lang="scss">
@import '../../../sass/imports';
  .border-b-input {
    border: thin solid $brand-bg-input;
  }

</style>