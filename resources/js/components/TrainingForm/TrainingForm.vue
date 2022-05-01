<template>
    <form ref="addTrainingForm" action="" @submit.prevent="save">
        <training-form-item :recruteur="recruteur" :years="years" :months="months" :processing="processing" :errors="errors" @onRemoveTraining="onRemoveTraining" :index="index" :training="training" v-for="(training, index) in trainings" :key="'training'+index"/>

        <div ref="addTraining" class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-primary btn-lg" @click.prevent="addTraining">
                <i class="fa fa-plus"></i> Ajouter une nouvelle formation
            </button>
        </div>
    </form>
</template>

<script>
    import TrainingFormItem from './TrainingFormItem';

    export default {

        props: ['recruteur', 'years', 'months'],

        components: { TrainingFormItem },

        data() {
            return {
                trainings: [{
                    formation: '',
                    etablissement: '',
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
                const trainings = this.trainings;

                this.processing = true;

                const data = {
                    step: '2',
                    training: {
                        ...trainings
                    }
                };

                axios.put(`/admin/recruteurs/${this.recruteur.id}/step2`, data).then(response => {
                    this.$refs.addTrainingForm.reset();
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

            addTraining() {
                this.trainings.push({
                    formation: '',
                    etablissement: '',
                    ville: '',
                    debut_mois: '',
                    fin_mois: '',
                    debut_annee: '',
                    fin_annee: '',
                    description: '',
                });
            },

            onRemoveTraining(index) {
                this.trainings = this.trainings.filter((tr, i) => index != i);
            },
        },

        mounted() {
            const savedTrainings = this.recruteur.trainings;
            
            if(savedTrainings.length) {
                this.trainings = savedTrainings;
            }
        }
    }
</script>

