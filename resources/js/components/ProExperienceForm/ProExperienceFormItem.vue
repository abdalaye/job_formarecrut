<template>
    <div class="border p-4 mb-4 rounded-sm">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="poste">Poste</label>
                    <input type="text" v-model="pro_experience.poste" id="poste" class="form-control" :class="{'is-invalid': hasError('poste', index)}">
                    <span class="invalid-feedback" v-if="hasError('poste', index)">{{ getError('poste', index) }}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Employeur</label>
                    <input type="text" v-model="pro_experience.employeur" class="form-control" :class="{'is-invalid': hasError('employeur', index)}">
                    <span class="invalid-feedback" v-if="hasError('employeur', index)">{{ getError('employeur', index) }}</span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Ville</label>
                    <input type="text" class="form-control" v-model="pro_experience.ville" :class="{'is-invalid': hasError('ville', index)}">
                    <span class="invalid-feedback" v-if="hasError('ville', index)">{{ getError('ville', index) }}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Date de début</label>
                            <select v-model="pro_experience.debut_mois" class="form-control custom-select" :class="{'is-invalid': hasError('debut_mois', index)}">
                                <option value="">Mois</option>
                                <option :value="month.value" :key="month.name" v-for="month in months">{{ month.name }}</option>
                            </select>
                            <span class="invalid-feedback" v-if="hasError('debut_mois', index)">{{ getError('debut_mois', index) }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="start_at">&nbsp;</label>
                            <select v-model="pro_experience.debut_annee" class="form-control custom-select" :class="{'is-invalid': hasError('debut_annee', index)}">
                                <option value="">Année</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>
                            <span class="invalid-feedback" v-if="hasError('debut_annee', index)">{{ getError('debut_mois', index) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="start_at">Date de fin</label>
                            <select :disabled="now" v-model="pro_experience.fin_mois" class="form-control custom-select" :class="{'is-invalid': hasError('fin_annee', index)}">
                                <option value="">Mois</option>
                                <option :value="month.value" :key="month.name" v-for="month in months">{{ month.name }}</option>
                            </select>
                            <span class="invalid-feedback" v-if="hasError('fin_mois', index)">{{ getError('fin_mois', index) }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="start_at" class="d-flex justify-content-between">&nbsp;</label>
                            <select :disabled="now" v-model="pro_experience.fin_annee" class="form-control custom-select" :class="{'is-invalid': hasError('fin_annee', index)}">
                                <option value="">Année</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>
                            <span class="invalid-feedback" v-if="hasError('fin_annee', index)">{{ getError('fin_annee', index) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea v-model="pro_experience.description" cols="30" rows="5" class="form-control" :class="{'is-invalid': hasError('description', index)}"></textarea>
                    <span class="invalid-feedback" v-if="hasError('description', index)">{{ getError('description', index) }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end" style="gap: 10px;">
                <button @click.prevent="removeProExperience(index)" :disabled="index == 0" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                <button type="submit" class="btn btn-success" :disabled="processing"><i class="fa fa-check"></i> Terminer</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        pro_experience: { type: Object },
        index: { type: Number },
        errors: { type: Object },
        processing: { type: Boolean },
    },

    data() {
        return {
            months: [
                {name: 'Janvier', value: '01'}, 
                {name: 'Février', value: '02'},
                {name: 'Mars', value: '03'},
                {name: 'Avril', value: '04'},
                {name: 'Mai', value: '05'},
                {name: 'Juin', value: '06'},
                {name: 'Juillet', value: '07'},
                {name: 'Août', value: '08'},
                {name: 'Septembre', value: '09'},
                {name: 'Octobre', value: '10'},
                {name: 'Novembre', value: '11'},
                {name: 'Décembre', value: '12'},
            ],

            now: false,
        }
    },

    methods: {
        removeProExperience(index) {
            this.$emit('onRemoveProExperience', index);
        },

        hasError(field, index) {
            return `pro_experience.${index}.${field}` in this.errors;
        },

        getError(field, index) {
            return this.hasError(field, index) ? this.errors[`pro_experience.${index}.${field}`][0] : ''; 
        }
    },
}
</script>