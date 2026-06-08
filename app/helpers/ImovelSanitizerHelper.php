<?php

namespace app\helpers;

class ImovelSanitizerHelper
{
    public static function sanitize(array $data): array
    {
        return [
            'nome_imovel' => SanitizerHelper::string($data['nome_imovel']),
            'tipo_imovel' => SanitizerHelper::string($data['tipo-imovel']),
            'descricao' => SanitizerHelper::string($data['descricao']),
            'preco' => SanitizerHelper::floatMoney($data['preco']),
            'condominio' => SanitizerHelper::floatMoney($data['condominio']),
            'modalidade' => SanitizerHelper::string($data['modalidade']),
            'destaque' => SanitizerHelper::string($data['destaque']),
            'area_total' => SanitizerHelper::int($data['area_total']),
            'area_util' => SanitizerHelper::int($data['area_util']),
            'quarto' => SanitizerHelper::int($data['quarto']),
            'suite' => SanitizerHelper::int($data['suite']),
            'garagem' => SanitizerHelper::int($data['garagem']),
            'banheiro' => SanitizerHelper::int($data['banheiro']),
            'cozinha' => SanitizerHelper::int($data['cozinha']),
            'sala_de_estar' => SanitizerHelper::int($data['sala_de_estar']),
            'cep' => SanitizerHelper::string($data['cep']),
            'estado' => SanitizerHelper::string($data['estado']),
            'municipio' => SanitizerHelper::string($data['municipio']),
            'bairro' => SanitizerHelper::string($data['bairro']),
            'bairro_slug' => SanitizerHelper::stringwithoutSpace($data['bairro']),
            'rua' => SanitizerHelper::string($data['rua']),
            'numero' => SanitizerHelper::int($data['numero']),
            'piscina' => SanitizerHelper::boolCheckbox($data['piscina'] ?? null),
            'churrasqueira' => SanitizerHelper::boolCheckbox($data['churrasqueira'] ?? null),
            'varanda' => SanitizerHelper::boolCheckbox($data['churrasqueira'] ?? null), 
        ];
    }
}
