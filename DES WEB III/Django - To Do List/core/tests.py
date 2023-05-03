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
 
class DeleteFromTest(TestCase):
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

