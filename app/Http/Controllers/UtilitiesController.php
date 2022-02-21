<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Info;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class UtilitiesController extends Controller
{
    static function uploadFile(UploadedFile $uploadFile, $folder,array $extensions = [], $randomName = "upload") {
        if($uploadFile->isValid() && in_array(strtolower($uploadFile->extension()), $extensions)) {
            $filename = time() . Str::slug($randomName) . '.' . $uploadFile->extension();
            try {
                $file = $uploadFile->move(public_path($folder), $filename);
                $path = $folder. '/' . $filename;
                return $path; //Update Image
            } catch (\Throwable $th) {
                return false;
            }
        }

        return false;
    }

    static function removeFile($relativepath) {
        $file_path = public_path($relativepath);
        if($relativepath && file_exists($file_path)) {
            unlink($file_path);
        }
    }

    static function bindFieldsToInfos($fields, $infos) {
        foreach ($fields as $field) {
            $field->info = self::getInfoByFielID($field->id, $infos);
        }

        return $fields;
    }

    static function getInfoByFielID($field_id, $infos) {
        if(count($infos) > 0) {
            foreach ($infos as $info) {
                if($info->field_id == $field_id) {
                    return $info;
                }
            }
        }
        return null;
    }

    static function saveOrUpdateInfos($document_id, $arraySubmitInfos, $extensions = []) {
        if(isset($arraySubmitInfos) && count($arraySubmitInfos) > 0) {
            foreach($arraySubmitInfos as $field_id => $value) {
                $infoAlreadyExist = Info::where('field_id', $field_id)
                                        ->where('document_id',$document_id)
                                        ->orderByDesc('updated_at')
                                        ->first();
                //Value field
                if(is_array($value)) {
                    try {
                        //Differencier le champs pièce jointe des autres champs
                        $field = Field::find($field_id);

                        if($field->type_field_id != 10) { // si ce n'est pas un champ piece jointe
                            if($field->type_field_id == 8 && !($field->dynamic == 1)) { //TYPE GRILLE STATIQUE
                                $newArray = [];
                                for($i= 0; $i < count($value); $i++) {
                                    $tmp_value = $value[$i];
                                    $without_space = str_replace(' ', '', $tmp_value);
                                    if(is_numeric($without_space)) {
                                        $tmp_value = $without_space;
                                    }
                                    array_push($newArray, implode(';', $tmp_value));
                                }
                                $value = implode('|', $newArray);
                            }
                            else {
                                $value = implode(";", $value);
                            }
                        }
                        else { // S'il s'agit d'une pièce jointe
                            //Verification que nous avons bien un fichier
                            $isFile = true;
                            if(isset($value)) {
                                $newInfo = new Info();
                                $newInfo->document_id = $document_id;
                                $newInfo->value = "save_doc";
                                $newInfo->field_id = $field_id;
                                if($newInfo->save()) {
                                    $uploadResult = self::uploadFile($value,"addional_infos", $extensions);
                                    if($uploadResult) {
                                        //Update
                                        $newInfo->value = $uploadResult;
                                        $newInfo->save();
                                    } else {
                                        $newInfo->value = "error_saving";
                                    }
                                } else {
                                    $newInfo->delete();
                                }

                                //Sortir d'un pas de la boucle
                                continue;
                            }
                        }

                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }

                if($infoAlreadyExist && !isset($isFile)) {
                    //Supression des autres Infos
                    Info::where('field_id', $field_id)
                    ->where('document_id',$document_id)
                    ->where('id', '!=', $infoAlreadyExist->id)->delete();

                    $infoAlreadyExist->value = $value;
                    if(!$infoAlreadyExist->save()) return false;
                } elseif(!$infoAlreadyExist && !isset($isFile)) {
                    $newInfo = new Info();
                    $newInfo->document_id = $document_id;
                    $newInfo->value = $value;
                    $newInfo->field_id = $field_id;
                    if(!$newInfo->save()) return false;
                }
            }
        }
        return true;
    }


}
