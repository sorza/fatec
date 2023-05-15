from django.test import TestCase
from .models import AtividadeModel
from .forms import AtividadeFormModel
from datetime import datetime

class IndexTest(TestCase):
    def setUp(self):
        self.resp = self.client.get('/')
    
    def test_200_response(self):
        self.assertEqual(200, self.resp.status_code)

    def test_template_index(self):
        self.assertTemplateUsed(self.resp, 'index.html')

    def test_texto(self):
        self.assertContains(self.resp, 'atividade')

class CadastroTest(TestCase):
     def setUp(self):
        self.resp = self.client.get('/cadastro')
    
     def test_301_response(self):
        self.assertEqual(301, self.resp.status_code)
    
class AtividadeModelTest(TestCase):
    def setUp(self):   
        self.cadastro = AtividadeModel(
            atividade = 'Prova',
            detalhes = 'Prova do Orlando DES WEB III',
            data = '2023-05-03'
        )
        self.cadastro.save()
    
    def test_created(self):
        self.assertTrue(AtividadeModel.objects.exists())

    def test_created_only_one(self):        
         self.assertTrue( len(AtividadeModel.objects.all()) == 1)

class AtividadeFormTest(TestCase):
    def test_form_has_fields(self):
        form = AtividadeFormModel()
        expected = ['atividade','detalhes','data']
        self.assertSequenceEqual(expected, list(form.fields))

    def test_validated_form(self, **kwargs):
        valid = dict(
            nome='Prova',
            detalhes='Prova do Orlando',
            data='2023-05-03'
        )

        data = dict(valid, **kwargs)
        form = AtividadeFormModel(data)
        form.is_valid()
        return form
 
class DeleteTest(TestCase):
    def setUp(self):     
        self.cadastro = AtividadeModel(
            atividade = 'Prova',
            detalhes = 'Prova do Orlando DES WEB III',
            data = '2023-05-03'
        )        
        self.cadastro.save()
        self.client.get('/remove/1/')        

    def test_object_removed(self):        
         self.assertTrue( len(AtividadeModel.objects.all()) == 0)

    def test_objects_exists(self):        
         self.assertFalse( AtividadeModel.objects.exists() )
    
class AtualizacaoTest(TestCase):
    def setUp(self):
        self.cadastro = AtividadeModel(
            atividade = 'Prova',
            detalhes = 'Prova do Orlando DES WEB III',
            data = '2023-05-03'
        )        
        self.cadastro.save()        
        self.resp = self.client.get('/atualizacao/1/')
    
    def test_200(self):
        self.assertEqual(200, self.resp.status_code)

    def test_template_atualizacao(self):
        self.assertTemplateUsed(self.resp, 'atualizacao.html')
    
    def test_Contais(self):
        self.assertContains(self.resp, 'Edição')