using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using ConsoleApplication2.ServiceReference1;
using Newtonsoft.Json;

namespace ConsoleApplication2
{
    class Program
    {
        static void Main(string[] args)
        {
            wsPortTypeClient mySoapClient = new wsPortTypeClient();

            Console.WriteLine(mySoapClient.checkUserLogin("admin","admin"));

           

           Product product = new Product();
           product.Name = "Apple";
           product.Expiry = new DateTime(2008, 12, 28);
           product.Count = 100;

           string json = JsonConvert.SerializeObject(product);
           string gameName = "Aliengame";
           Console.WriteLine(mySoapClient.insertMongo(json,gameName));
         
        }
    }
}
