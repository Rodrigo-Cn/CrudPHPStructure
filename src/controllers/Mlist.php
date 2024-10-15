<?php

    class Mlist {
        public function listMembers() {
            echo "Listando membros.";
        }

        public function add() {
            echo "Formulário para adicionar membro.";
        }

        public function doneAdd() {
            echo "Membro adicionado com sucesso.";
        }

        public function detail($id) {
            echo "Detalhes do membro com ID: " . htmlspecialchars($id);
        }

        public function edit($id) {
            echo "Formulário para editar o membro com ID: " . htmlspecialchars($id);
        }

        public function doneEdit() {
            echo "Membro editado com sucesso.";
        }

        public function delete($id) {
            echo "Membro com ID " . htmlspecialchars($id) . " deletado.";
        }
    }

?>