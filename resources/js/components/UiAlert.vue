<template>
   <transition name="fade" :css="disableAnimation">
        <div v-if="" class="ui-alert" :class="classes" role="alert">
            <div class="ui-alert__body">
                <div class="ui-alert__icon" v-if="!removeIcon">
                    <slot name="icon">
                        <img v-show="type == TYPE_SUCCESS" src="../../assets/icons/check.png" title="tick icons" alt="Chrono knowledge icon"/>
                        <img v-show="type == TYPE_INFO" src="../../assets/icons/info.png" title="info icons" alt="Chrono knowledge icon"/>
                        <img v-show="type == TYPE_WARNING" src="../../assets/icons/warning.png" title="warning icons" alt="Chrono knowledge icon"/>
                        <img v-show="type == TYPE_ERROR" src="../../assets/icons/alert.png" title="alert icons" alt="Chrono knowledge icon"/>
                    </slot>
                </div>

                <div class="ui-alert__content">
                    <slot></slot>
                </div>

                <div class="ui-alert__dismiss-button">
                  <img v-if="dismissible" @click="dismissAlert()" role="button" style="width: 10px; height: auto" src="../../assets/icons/close.png" title="close icons" alt="Chrono knowledge icon"/>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import { getters, mutations, actions } from '../store'

export default {
    name: 'ui-button',
    props: {
      type: {
          type: String,
          default: 'info' // 'info', 'success', 'warning', or 'error'
      },
      removeIcon: {
          type: Boolean,
          default: false
      },
      disableAnimation: {
          type: Boolean,
          default: false
      },
      dismissible: {
          type: Boolean,
          default: true
      },
      timer: {
          type: Number,
          default: 10  //  in secs
      }
    },
    data() {
        return {
            timerCount: 0
        }
    },
    created() {
        // TYPE OF ALERT
        this.TYPE_INFO = "info";
        this.TYPE_SUCCESS = "success";
        this.TYPE_WARNING = "warning";
        this.TYPE_ERROR = "error";
    },
    beforeMount() {
        console.log(this.timerCount);
        this.timerCount = this.timer;
    },
    computed: {
      ...getters,
        classes() {
            return [
                `ui-alert--type-${this.type}`,
                { 'has-no-transition': this.disableAnimation }
            ];
        }
    },
    methods: {
        ...mutations, ...actions,
        dismissAlert() {
            console.log('dismiss alert');
            this.$emit('dismiss');
        },
    },
    watch: {
        timerCount: {
            handler(value) {

                if (value > 0) {
                    setTimeout(() => {
                        this.timerCount--;

                        if(this.timerCount == 0) {
                            this.dismissAlert();
                        }
                    }, 1000);
                }

            },
            immediate: true // This ensures the watcher is triggered upon creation
        }

    }
}
</script>

<style scoped lang="scss">
@import '../../sass/imports';


$ui-alert-color             : rgba(black, 0.75) !default;
$ui-alert-font-size         : rem(15px) !default;
$ui-alert-margin-bottom     : rem(16px) !default;

.ui-alert {
    min-height: 70px;
    width: 95%;
    margin: auto;
    display: flex;
    font-family: $font-stack;
    font-size: $ui-alert-font-size;
    line-height: 1.4;
    margin-bottom: $ui-alert-margin-bottom;
    overflow: hidden;
    position: absolute;
    right: 15px;
    left: 15px;
    bottom: 0;
    transition: margin-bottom 0.3s;
    opacity: 0.7;
    &.has-no-transition {
        &,
        .ui-alert__body {
            transition: none;
        }
    }
    &:hover {
        opacity: 1;
    }
    a {
        text-decoration: none;
        &:hover,
        &:focus {
            text-decoration: underline;
        }
    }
}
.ui-alert__icon {
    flex-shrink: 0;
    margin-right: rem(12px);

    img {
      width: 20px;
      height: auto;
    }
}
.ui-alert__body {
    align-items: center;
    color: $ui-alert-color;
    display: flex;
    flex-direction: row;
    margin-bottom: 0;
    margin-top: 0;
    min-height: rem(48px);
    padding: 0.75rem 2rem 0.75rem 1rem;
    border-radius: 5px;
;
    transition: opacity 0.3s, margin-top 0.4s;
    width: 100%;
}
.ui-alert__content {
    flex-grow: 1;
    word-break: break-all;
}
.ui-alert__dismiss-button {
    position: absolute;
    top: 20px;
    right: 20px;
    align-self: flex-start;
    flex-shrink: 0;
    margin-bottom: rem(-4px);
    margin-left: rem(8px);
    margin-right: rem(-8px);
    margin-top: rem(-4px);
}

// ================================================
// Types
// ================================================
.ui-alert--type-info {
    .ui-alert__body {
        background-color: rgba($brand-color-info, 0.12);
    }
    .ui-alert__icon {
        color: $brand-color-info;
    }
    a {
        color: $brand-color-info;
    }
}
.ui-alert--type-success {
    .ui-alert__body {
        background-color: rgba($brand-color-success, 0.12);
    }
    .ui-alert__icon {
        color: $brand-color-success;
    }
    a {
        color: $brand-color-success;
    }
}
.ui-alert--type-warning {
    .ui-alert__body {
        background-color: rgba($brand-color-warning, 0.12);
    }
    .ui-alert__icon {
        color: $brand-color-warning;
    }
    a {
        color: $brand-color-warning;
    }
}
.ui-alert--type-error  {
    .ui-alert__body {
        background-color: rgba($brand-color-danger, 0.12);
    }
    .ui-alert__icon {
        color: $brand-color-danger;
    }
    a {
        color: $brand-color-danger;
    }
}

</style>