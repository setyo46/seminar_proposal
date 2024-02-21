<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KBBIRest extends BaseController
{
    public function index()
    {
        $kbbiApi = new KBBIApi();

        // Search for each word in the phrase separately for the first phrase
        $words_1 = explode(' ', 'impor jagung biru');
        $definitions_1 = [];

        foreach ($words_1 as $word_1) {
            $result_1 = $kbbiApi->search($word_1);

            if (isset($result_1['arti']) && is_array($result_1['arti']) && !empty($result_1['arti'][0])) {
                // Get the first definition
                $definitions_1[] = $result_1['arti'][0];
            } else {
                // Handle the case where definition is not found for a word
                return $this->response->setJSON(['error' => "Definition not found for '$word_1'"]);
            }
        }

        // Search for each word in the phrase separately for the second phrase
        $words_2 = explode(' ', 'ekspor jagung merah');
        $definitions_2 = [];

        foreach ($words_2 as $word_2) {
            $result_2 = $kbbiApi->search($word_2);

            if (isset($result_2['arti']) && is_array($result_2['arti']) && !empty($result_2['arti'][0])) {
                // Get the first definition
                $definitions_2[] = $result_2['arti'][0];
            } else {
                // Handle the case where definition is not found for a word
                return $this->response->setJSON(['error' => "Definition not found for '$word_2'"]);
            }
        }

        // Combine definitions or perform further analysis as needed
        $combined_definition_1 = implode(', ', $definitions_1);
        $combined_definition_2 = implode(', ', $definitions_2);

        // Remove whitespace and normalize case for comparison
        $combined_definition_1 = strtoupper(str_replace(' ', '', $combined_definition_1));
        $combined_definition_2 = strtoupper(str_replace(' ', '', $combined_definition_2));

        // Compute similarity between combined definitions
        $result_similarity = similar_text($combined_definition_1, $combined_definition_2);

        $normalized_similarity = ($result_similarity / strlen($combined_definition_1)) * 100;
        $similarity_percentage = number_format($normalized_similarity, 2);

        echo "Combined Definition 1: $combined_definition_1\n";
        echo "Combined Definition 2: $combined_definition_2\n";

        return $this->response->setJSON('Similarity: ' . $similarity_percentage . ' %');
    }
}
