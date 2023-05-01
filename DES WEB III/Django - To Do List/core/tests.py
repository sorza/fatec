from django.test import TestCase

class IndexTest(TestCase):
    def setUp(self):
        self.resp = self.client.get('/')
    
    def test_200_response(self):
        self.assertEqual(200, self.resp.status_code)

    def test_template_index(self):
        self.assertTemplateUsed(self.resp, 'index.html')
       
    
    
