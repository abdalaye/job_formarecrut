<template>
    <form ref="addProExperienceForm" @submit.prevent="save">
        <pro-experience-form-item :processing="processing" :errors="errors" @onRemoveProExperience="onRemoveProExperience" :index="index" :pro_experience="pro_experience" v-for="(pro_experience, index) in pro_experiences" :key="'pro_experience'+index"/>

        <div class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-primary btn-lg" @click.prevent="addProExperience">
                <i class="fa fa-plus"></i> Ajouter une nouvelle experience professionnelle
            </button>
        </div>
    </form>
</template>

<script>
    import ProExperienceFormItem from './ProExperienceFormItem';

    export default {

        props: ['recruteur'],

        components: { ProExperienceFormItem },

        data() {
            return {
                pro_experiences: [{
                    poste: '',
                    employeur: '',
                    ville: '',
                    debut_mois: '',
                    fin_mois: '',
                    debut_annee: '',
                    fin_annee: '',
                    description: '',
                }],

                errors: new Object,

                processing: false,
            }
        },

        methods: {

            save() {
                const pro_experiences = this.pro_experiences;

                this.processing = true;

                const data = {
                    step: '3',
                    pro_experience: {
                        ...pro_experiences
                    }
                };

                axios.put(`/admin/recruteurs/${this.recruteur.id}/step3`, data).then(response => {
                    this.$refs.addProExperienceForm.reset();
                    const { data } = response;
                    window.location.href = data.target;
                }).catch(error => {
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                }).finally(_ => {
                    this.processing = false;
                });
            },

            addProExperience() {
                this.pro_experiences.push({
                    poste: '',
                    employeur: '',
                    ville: '',
                    debut_mois: '',
                    fin_mois: '',
                    debut_annee: '',
                    fin_annee: '',
                    description: '',
                });
            },

            onRemoveProExperience(index) {
                this.pro_experiences = this.pro_experiences.filter((tr, i) => index != i);
            },
        },
    }
</script>

